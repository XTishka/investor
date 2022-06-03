<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Round;
use App\Models\Week;
use App\Models\Wish;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use App\Http\Requests\WishRequest;

class WishController extends Controller
{
    public function index(Round $round)
    {
        $countries = Property::select('country')->distinct()->get();
        $weeks = Week::where('round_id', $round->currentRoundId())->get();
        return view('wisher', compact('countries', 'weeks'));
    }

    public function store(WishRequest $request) {
        $validatedRequest = $request->validated();
        $validatedRequest['user_id'] = auth()->user()->id;

        $wishes = Wish::select('id', 'week_id', 'wishes')
            ->where('user_id', auth()->user()->id)
            ->where('week_id', $validatedRequest['week_id'])
            ->where('property_id', $validatedRequest['property_id'])->first();

        if ($wishes) {
            $validatedRequest['wishes'] = $validatedRequest['wishes'] + $wishes->wishes;
            if ($validatedRequest['wishes'] <= 20) {
                $wishes->update($validatedRequest);
                $status = 'success';
                $flash = 'Your wishes were successfully updated!';
            } else {
                $status = 'error';
                $flash = 'Something goes wrong! Too much wishes were send';
            }
        } else {
            if ($validatedRequest['wishes'] <= 20) {
                Wish::create($validatedRequest);
                $status = 'success';
                $flash = 'Your wishes were successfully added!';
            } else {
                $status = 'error';
                $flash = 'Something goes wrong! Too much wishes were send';
            }
        }


        return back()->with($status, $flash);
    }

    public function getPropertiesByCountry(Request $request)
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

    public function getWishesOptionsList(Request $request)
    {
        $wishesMax = 20;
        $wishes = Wish::select('week_id', 'wishes')
            ->where('user_id', auth()->user()->id)
            ->where('week_id', $request->week)
            ->groupBy('week_id')
            ->sum('wishes');


        $availableWishesFolmula = "$wishesMax - $wishes";
        $availableWishes = $wishesMax - $wishes;

        Debugbar::info($request->week);
        Debugbar::info($availableWishesFolmula);
        Debugbar::info($availableWishes);

        $html = '';
        if ($availableWishes > 0) {
            for ($i = 1; $i <= $availableWishes; $i++) {
                $html .= '<option value="' . $i . '">' . $i . '</option>';
            }
        } else {
            $html .= '<option value="">You don\'t have avalable wishes for this week</option>';
        }

        return response()->json(['html' => $html]);
    }

}
