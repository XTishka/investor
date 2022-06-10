<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyAvailability;
use App\Models\Round;
use App\Models\Week;
use App\Models\Wish;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use App\Http\Requests\WishRequest;
use App\Models\Priority;
use DebugBar\DebugBar as DebugBarDebugBar;
use Illuminate\Http\JsonResponse;

class WishController extends Controller
{
    public function index(Round $round, Wish $wishes)
    {
        $roundId = $round->currentRoundId();
        $countries = Property::select('country')->distinct()->orderBy('country')->get();
        $usedWishes = $wishes->usedRoundWishes($roundId);
        $maxRoundWishes = $round->find($roundId)->value('max_wishes');
        $availableWishes = $maxRoundWishes - $usedWishes->count();

        return view('wisher', compact('countries', 'usedWishes', 'availableWishes'));
    }

    public function store(WishRequest $request, Wish $wishes)
    {
        $validatedRequest = $request->validated();
        $validatedRequest['user_id'] = auth()->user()->id;

        $wish = Wish::firstOrCreate(
            [
                'user_id' => $validatedRequest['user_id'],
                'week_id' => $validatedRequest['week_id'],
                'property_id' => $validatedRequest['property_id'],
            ]
        );

        if ($wish->wasRecentlyCreated == true) {
            $flashType = 'success';
            $message = 'Your wishes were successfully added!';
        } else {
            $flashType = 'warning';
            $message = 'You have sent wish with same parameters before!';
        }

        return back()->with($flashType, $message);
    }

    public function delete($id)
    {
        $wish = Wish::find($id);
        $wish->delete();
        return back();
    }

    public function getPropertiesByCountry(Request $request): JsonResponse
    {
        $properties = Property::select('id', 'name')
            ->where('country', $request->country)
            ->get();

        if ($request->country) {
            $html = '<option value="" selected>Select property</option>';
            foreach ($properties as $property) {
                $html .= '<option value="' . $property->id . '">' . $property->name . '</option>';
            }
        }

        return response()->json(['html' => $html]);
    }

    public function getWeeksOptionsList(
        Request $request,
        Round $round,
        PropertyAvailability $availability,
        Priority $priority,
        Wish $wish
    ): JsonResponse {
        $roundId = $round->currentRoundId();
        $userId = auth()->user()->id;
        $weeks = Week::where('round_id', $roundId)->get();
        $usedWishes = Wish::where('user_id', $userId)->where('property_id', $request->property_id)->get();
        $usedWishesIds = $usedWishes->pluck('week_id');
        $maxAvailablePerWeek = $priority->where('round_id', $roundId)
            ->where('user_id', $userId)
            ->value('available_weeks');

        $usedPropertyWeeks = $wish->usedPropertyRoundWishes($roundId, $request->property_id)->count();

        if ($usedPropertyWeeks >= $maxAvailablePerWeek) return response()->json(['html' => '<option value="">You have reach limit for this property</option>']);

        $html = '<option value="">Select week</option>';
        foreach ($weeks as $week) {
            $weekStartDate = date('j F, Y', strtotime($week->start_date));
            $weekEndDate = date('j F, Y', strtotime($week->end_date));

            if (!in_array($week->id, $usedWishesIds->all())) {
                $weekIsAvailable = $availability->checkAvailability($week->id, $request->property_id);

                if ($weekIsAvailable == true) {

                    $html .= "<option value='$week->id'>";
                    $html .= "Week $week->number ( $weekStartDate - $weekEndDate )";
                    $html .= "</option>";
                }
            }
        }

        return response()->json(['html' => $html]);
    }
}
