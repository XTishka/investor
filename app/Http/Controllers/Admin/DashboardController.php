<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Round;
use App\Models\Priority;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, User $users, Round $round, Priority $priorities)
    {
        $rounds = $round->all();
        $roundId = ($request->round_id) ? $request->round_id : $round->currentRoundId();
        $round = $rounds->where('id', $roundId)->first();
        $stockholders = $users->getStockholdersWithPriorityAndRound($roundId);
        return view('admin.dashboard', compact('stockholders', 'rounds', 'round'));
    }
}
