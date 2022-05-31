<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Round;
use App\Models\Week;
use App\Models\Wish;
use Barryvdh\Debugbar\DebugbarViewEngine;
use Barryvdh\Debugbar\Facades\Debugbar;
use Carbon\Carbon;
use Database\Factories\WishesFactory;
use Illuminate\Http\Request;
use Symfony\Component\ErrorHandler\Debug;

class WishController extends Controller
{
    public function index(Round $round)
    {
        $countries = Property::select('country')->distinct()->get();
        $weeks = Week::where('round_id', $round->currentRoundId())->get();
        return view('wisher', compact('countries', 'weeks'));
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

    public function getWishesQtyByWeekNumber(Request $request)
    {
        Debugbar::info('Wish number');
        $html = '( available: 18 )';
        return $html;
    }

    public function getWishesOptionsList(Request $request)
    {
        $wishesMax = 20;
        $wishes = Wish::where('user_id', auth()->user()->id)
            ->where('week_id', $request->week)
            ->value('wishes');


        $availableWishesFolmula = "$wishesMax - $wishes";
        $availableWishes = $wishesMax - $wishes;

        Debugbar::info($availableWishesFolmula);
        Debugbar::info($availableWishes);

        $html = '';
        for ($i = 1; $i <= $availableWishes; $i++) {
            $html .= '<option value="' . $i . '">' . $i . '</option>';
        }
        return response()->json(['html' => $html]);
    }

}
