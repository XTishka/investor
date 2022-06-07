<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StoreStockholderRequest;
use App\Http\Requests\admin\UpdateStockholderRequest;
use App\Models\Priority;
use App\Models\Property;
use App\Models\Round;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class StockholderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request, User $users, Round $round, Priority $priorities): Application|Factory|View
    {
        $rounds = $round->all();
        $roundId = ($request->round_id) ? $request->round_id : $round->currentRoundId();
        $round = $rounds->where('id', $roundId)->first();
        $maxPriority = $priorities->where('round_id', $round->currentRoundId())->max('priority');
        $stockholders = $users->getStockholdersWithPriorityAndRound($roundId);
        return view('admin.stockholders.index', compact('stockholders', 'maxPriority', 'rounds', 'round'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $rounds = Round::all();
        return view('admin.stockholders.create', compact('rounds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStockholderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreStockholderRequest $request, Priority $priority): RedirectResponse
    {
        $stockholder = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $minPriority = $priority->where('round_id', $request->round)->max('priority');
        Priority::create([
            'user_id' => $stockholder->id,
            'round_id' => $request->round,
            'priority' => $minPriority + 1,
        ]);

        return redirect()->route('admin.stockholders');
    }

    /**
     * Display the specified resource.
     *
     * @param User $stockholder
     * @return Application|Factory|View
     */
    public function show(User $stockholder): Application|Factory|View
    {
        $properties = Property::all();
        return view('admin.stockholders.show', compact('stockholder', 'properties'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $stockholder
     * @return Application|Factory|View
     */
    public function edit(User $stockholder): View|Factory|Application
    {
        return view('admin.stockholders.edit', compact('stockholder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStockholderRequest $request
     * @param User $stockholder
     * @return RedirectResponse
     */
    public function update(UpdateStockholderRequest $request, User $stockholder): RedirectResponse
    {
        $stockholder->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('stockholders.show', $stockholder);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $stockholder
     * @return RedirectResponse
     */
    public function destroy(User $stockholder): RedirectResponse
    {
        $stockholder->delete();

        return redirect()->route('admin.stockholders');
    }
}
