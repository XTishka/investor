<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Round;
use App\Services\WeeksService;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PropertyController extends Controller
{
    public function index()
    {
        return view('admin.properties.index');
    }

    public function create()
    {
        return view('admin.properties.create');
    }

    public function edit(Property $property)
    {
        return view('admin.properties.edit', compact('property'));
    }

    public function show(Property $property)
    {
        // $roundWeeks = [];
        // if (Session::get('active_round')) {
        //     $round = Round::query()->find(Session::get('active_round'));
        //     $roundWeeks = $weekService->roundWeeksWithStatus($round->start_date, $round->end_date, $round->id, $property->id);
        // }
        // dd($property);
        return view('admin.properties.show', compact('property'));
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.properties');
    }
}
