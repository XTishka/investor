<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StoreRoundRequest;
use App\Http\Requests\admin\UpdateRoundRequest;
use App\Models\Round;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Actions\GenerateRoundWeeksAction;

class RoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $rounds = Round::all();
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
    public function store(StoreRoundRequest $request): RedirectResponse
    {
        Round::create($request->validated());
        return redirect()->route('admin.rounds');
    }

    /**
     * Display the specified resource.
     *
     * @param Round $round
     * @return Application|Factory|View
     */
    public function show(Round $round, GenerateRoundWeeksAction $weeks): View|Factory|Application
    {
        return view('admin.rounds.show', [
            'round' => $round,
            'weeks' => $weeks->handle($round),
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
    public function update(UpdateRoundRequest $request, Round $round): RedirectResponse
    {
        $round->update($request->validated());
        return redirect()->route('rounds.show', $round);
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