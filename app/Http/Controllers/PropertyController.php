<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Round;
use App\Services\WeeksService;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Exports\PropertiesExport;
use Maatwebsite\Excel\Facades\Excel;

class PropertyController extends Controller
{
    public $timestamp;

    public function __construct(Request $request)
    {
        $this->timestamp = now()->timestamp;
    }

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

    public function show(Property $property, WeeksService $weeksService)
    {
        $roundWeeks = [];
        $roundId = Session::get('active_round');
        if ($roundId) {
            $round = Round::query()->find($roundId);
            $roundWeeks = $weeksService->roundWeeksWithStatus($round->start_date, $round->end_date, $round->id, $property->id);
        }
        return view('admin.properties.show', compact('property', 'roundId','roundWeeks'));
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.properties');
    }

    public function import()
    {
        return view('admin.properties.import');
    }

    public function export()
    {
        return Excel::download(new PropertiesExport, 'properties_' . $this->timestamp . '.csv');
    }
}
