<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyAvailability;
use App\Models\Week;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Wish;
use Barryvdh\Debugbar\Facades\Debugbar;

class PropertyAvailabiltyController extends Controller
{

    public function store(Request $request, Week $week): RedirectResponse
    {
        $checkWishes = $week->hasWishes($request->week_id, $request->property_id); 
        if  ( $checkWishes == true ) return back();

        PropertyAvailability::firstOrCreate([
            'week_id' => $request->week_id,
            'property_id' => $request->property_id
        ]);
        

        return back();
    }

    public function destroy(Request $request, Week $week): RedirectResponse
    {
        $availability = PropertyAvailability::where('week_id', $request->week_id)
        ->where('property_id', $request->property_id);
        $availability->delete();

        return back();
    }
}
