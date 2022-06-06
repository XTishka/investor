<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StorePropertyRequest;
use App\Http\Requests\admin\UpdatePropertyRequest;
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

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $properties = Property::all()->sortBy('country');
        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePropertyRequest $request
     * @return RedirectResponse
     */
    public function store(StorePropertyRequest $request): RedirectResponse
    {
        Property::create($request->validated());
        return redirect()->route('admin.properties');
    }

    /**
     * Display the specified resource.
     *
     * @param Property $property
     * @return Application|Factory|View
     */
    public function show(Property $property, Round $round): View|Factory|Application
    {
        $currentRoundId = $round->currentRoundId();
        $weeks = Week::where('round_id', $currentRoundId)->get()->sortBy('start_date');
        
        return view('admin.properties.show', compact('property', 'weeks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Property $property
     * @return Application|Factory|View
     */
    public function edit(Property $property): View|Factory|Application
    {
        return view('admin.properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePropertyRequest $request
     * @param Property $property
     * @return RedirectResponse
     */
    public function update(UpdatePropertyRequest $request, Property $property): RedirectResponse
    {
        $property->update($request->validated());
        return redirect()->route('properties.show', $property);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Property $property
     * @return RedirectResponse
     */
    public function destroy(Property $property): RedirectResponse
    {
        $property->delete();
        return redirect()->route('admin.properties');
    }
}
