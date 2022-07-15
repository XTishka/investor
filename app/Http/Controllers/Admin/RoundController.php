<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StoreRoundRequest;
use App\Http\Requests\admin\UpdateRoundRequest;
use App\Models\Round;
use App\Models\Week;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Actions\GenerateRoundWeeksAction;
use App\Actions\SetWeekNumberAndDates;

class RoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $rounds = Round::all()->sortBy('end_wishes_date');
        return view('admin.rounds.index', compact('rounds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('admin.rounds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRoundRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRoundRequest $request, GenerateRoundWeeksAction $weeks): RedirectResponse
    {
        $round = Round::create($request->validated());
        $weeks->handle($round->id, $request);
        return redirect()->route('admin.rounds');
    }

    /**
     * Display the specified resource.
     *
     * @param Round $round
     * @return Application|Factory|View
     */
    public function show(Round $round, SetWeekNumberAndDates $weeksUpdate): View|Factory|Application
    {
        $weeks = Week::where('round_id', $round->id)->get()->sortBy('start_date');
        return view('admin.rounds.show', [
            'round' => $round,
            'weeks' => $weeks,
            'currentDate' => Carbon::now(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Round $round
     * @return Application|Factory|View
     */
    public function edit(Round $round): View|Factory|Application
    {
        return view('admin.rounds.edit', compact('round'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoundRequest $request
     * @param Round $round
     * @return RedirectResponse
     */
    public function update(UpdateRoundRequest $request, Round $round, GenerateRoundWeeksAction $weeks): RedirectResponse
    {
        $round->update($request->validated());
        $weeks->handle($round->id, $request);
        return redirect()->route('admin.rounds.show', $round);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Round $round
     * @return RedirectResponse
     */
    public function destroy(Round $round): RedirectResponse
    {
        $round->delete();
        return redirect()->route('admin.rounds');
    }
}
