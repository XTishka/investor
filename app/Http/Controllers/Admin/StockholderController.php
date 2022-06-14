<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StoreStockholderRequest;
use App\Http\Requests\admin\UpdateStockholderRequest;
use App\Imports\StockholdersImport;
use App\Models\Priority;
use App\Models\Property;
use App\Models\Round;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Excel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Wish;

class StockholderController extends Controller
{

    public function index(Request $request, User $users, Round $round, Priority $priorities): Application|Factory|View
    {
        $rounds = $round->all();
        $roundId = ($request->round_id) ? $request->round_id : $round->currentRoundId();
        $round = $rounds->where('id', $roundId)->first();
        $maxPriority = $priorities->where('round_id', $round->currentRoundId())->max('priority');
        $stockholders = $users->getStockholdersWithPriorityAndRound($roundId);
        return view('admin.stockholders.index', compact('stockholders', 'maxPriority', 'rounds', 'round'));
    }


    public function create(): Application|Factory|View
    {
        $rounds = Round::all();
        return view('admin.stockholders.create', compact('rounds'));
    }


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
            'available_weeks' => $request->available_weeks,
            'priority' => $minPriority + 1,
        ]);

        return redirect()->route('admin.stockholders');
    }


    public function show(User $stockholder): Application|Factory|View
    {
        $wishes = Wish::where('user_id', $stockholder->id)->get();
        return view('admin.stockholders.show', compact('stockholder', 'wishes'));
    }


    public function edit(User $stockholder): View|Factory|Application
    {
        return view('admin.stockholders.edit', compact('stockholder'));
    }


    public function update(UpdateStockholderRequest $request, User $stockholder): RedirectResponse
    {
        $stockholder->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('stockholders.show', $stockholder);
    }


    public function destroy(User $stockholder): RedirectResponse
    {
        $stockholder->delete();

        return redirect()->route('admin.stockholders');
    }

    public function import(Request $request)
    {
        Priority::where('round_id', $request->round)->delete();
        Excel::import(new StockholdersImport($request->round), $request->file('file')->store('temp'));
        return redirect()->route('admin.stockholders');
    }
}
