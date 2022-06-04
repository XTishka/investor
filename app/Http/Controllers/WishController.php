<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Round;
use App\Models\Week;
use App\Models\Wish;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use App\Http\Requests\WishRequest;
use Illuminate\Http\JsonResponse;

class WishController extends Controller
{
    public function index(Round $round, Wish $wishes)
    {
        $countries = Property::select('country')->distinct()->get();
        $usedWishes = $wishes->usedRoundWishes();

        return view('wisher', compact('countries', 'usedWishes'));
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

    public function getWeeksOptionsList(Request $request, Round $round): JsonResponse
    {
        $weeks = Week::where('round_id', $round->currentRoundId())->get();
        $usedWishes = Wish::where('user_id', auth()->user()->id)->get();
        $usedWishesIds = $usedWishes->pluck('week_id');

        Debugbar::info('Property ID: ' . $request->property_id);
        Debugbar::info($usedWishes);
        Debugbar::info($usedWishesIds->all());

        $html = '<option value="">Select week</option>';
        foreach ($weeks as $week) {
            $weekStartDate = date('j F, Y', strtotime($week->start_date));
            $weekEndDate = date('j F, Y', strtotime($week->end_date));

            if (!in_array($week->id, $usedWishesIds->all(), )) {
                $html .= "<option value='$week->id'>";
                $html .= "Week $week->number ( $weekStartDate - $weekEndDate )";
                $html .= "</option>";
            }
        }

        return response()->json(['html' => $html]);
    }
}
