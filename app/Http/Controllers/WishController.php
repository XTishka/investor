<?php

namespace App\Http\Controllers;

use App\Http\Middleware\IsAdmin;
use App\Models\Property;
use App\Models\PropertyAvailability;
use App\Models\Round;
use App\Models\Week;
use App\Models\Wish;
use Illuminate\Http\Request;
use App\Http\Requests\WishRequest;
use App\Http\Traits\ActiveRoundTrait;
use App\Models\Priority;
use Illuminate\Http\JsonResponse;

class WishController extends Controller
{
    use ActiveRoundTrait;

    public function index(Round $round, Wish $wishes)
    {
        if (auth()->user()->is_admin) return redirect()->route('admin.dashboard');

        $userId = auth()->user()->id;
        $roundId = $this->activeRound()->id;

        $countries = Property::select('country')->distinct()->orderBy('country')->get();
        $usedWishes = $wishes->usedRoundWishes($this->activeRound()->id)->sortBy('week_number');
        $maxRoundWishes = $round->find($this->activeRound()->id)->value('max_wishes');
        $availableWishes = $maxRoundWishes - $usedWishes->count();

        return view('wisher', compact('userId', 'roundId', 'countries', 'usedWishes', 'availableWishes'));
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
            $message = __('front.success_message');
        } else {
            $flashType = 'warning';
            $message = __('front.error_message');
        }

        return back()->with($flashType, $message);
    }

    public function delete($id)
    {
        $wish = Wish::find($id);
        $wish->delete();
        return back();
    }

    public function noRounds() {
        if ($this->activeRound()) return redirect()->route('wisher');
        return view('noRounds');
    }

    public function getPropertiesByCountry(Request $request): JsonResponse
    {
        $properties = Property::select('id', 'name')
            ->where('country', $request->country)
            ->get();

        if ($request->country) {
            $html = '<option value="" selected>' . __('front.property') . '</option>';
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
        $roundId = $this->activeRound()->id;
        $userId = auth()->user()->id;
        $weeks = Week::where('round_id', $roundId)->get();
        $usedWishes = Wish::where('user_id', $userId)->where('property_id', $request->property_id)->get();
        $usedWishesIds = $usedWishes->pluck('week_id');
        $maxAvailablePerWeek = $priority->where('round_id', $roundId)
            ->where('user_id', $userId)
            ->value('available_weeks');

        $usedPropertyWeeks = $wish->usedPropertyRoundWishes($roundId, $request->property_id)->count();

        if ($usedPropertyWeeks >= $maxAvailablePerWeek) return response()->json(['html' => '<option value="">' . __('front.warning_weeks_limit') . '</option>']);

        $html = '<option value="">' . __('front.week') . '</option>';
        foreach ($weeks as $week) {
            $weekStartDate = date('j F, Y', strtotime($week->start_date));
            $weekEndDate = date('j F, Y', strtotime($week->end_date));

            if (!in_array($week->id, $usedWishesIds->all())) {
                $weekIsAvailable = $availability->checkAvailability($week->id, $request->property_id);

                if ($weekIsAvailable == true) {

                    $html .= "<option value='$week->id'>";
                    $html .= __('front.week') . " $week->number ( $weekStartDate - $weekEndDate )";
                    $html .= "</option>";
                }
            }
        }

        return response()->json(['html' => $html]);
    }
}
