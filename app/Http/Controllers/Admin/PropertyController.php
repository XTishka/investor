<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StorePropertyRequest;
use App\Http\Requests\admin\UpdatePropertyRequest;
use App\Http\Traits\ActiveRoundTrait;
use App\Models\Property;
use App\Models\PropertyAvailability;
use App\Models\Round;
use App\Models\Week;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Imports\PropertyImport;
use Maatwebsite\Excel\Facades\Excel;

class PropertyController extends Controller
{
    use ActiveRoundTrait;

    public function index(Round $round): Application|Factory|View
    {
        $round = $this->activeRound()->id;
        $properties = Property::all()->sortBy('country');
        return view('admin.properties.index', compact('properties', 'round'));
    }


    public function create(): View|Factory|Application
    {
        return view('admin.properties.create');
    }


    public function store(StorePropertyRequest $request): RedirectResponse
    {
        Property::create($request->validated());
        return redirect()->route('admin.properties');
    }


    public function show(Property $property, Round $round): View|Factory|Application
    {
        $rounds = $round->all();
        $roundId = ($round->id) ? $round->id : $this->activeRound()->id;
        $round = $rounds->where('id', $roundId)->first();
        $weeks = Week::where('round_id', $roundId)->get()->sortBy('start_date');
        
        return view('admin.properties.show', compact('property', 'weeks', 'round', 'rounds'));
    }


    public function edit(Property $property): View|Factory|Application
    {
        $round = Round::find($this->activeRound()->id);
        return view('admin.properties.edit', compact('property', 'round'));
    }


    public function update(UpdatePropertyRequest $request, Property $property): RedirectResponse
    {
        $property->update($request->validated());
        return redirect()->route('admin.properties.show', [$property, $this->activeRound()->id]);
    }


    public function destroy(Property $property): RedirectResponse
    {
        $property->delete();
        return redirect()->route('admin.properties');
    }

    public function import(Request $request)
    {
        Excel::import(new PropertyImport(), $request->file('file')->store('temp'));
        return redirect()->route('admin.properties');
    }
}
