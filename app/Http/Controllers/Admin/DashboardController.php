<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Round;
use App\Models\Priority;
use App\Models\Wish;
use Barryvdh\Debugbar\Facades\Debugbar;

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
    public function index(Request $request, User $stockholders, Round $round, Priority $priorities, Wish $wishes)
    {
        $rounds = $round->all();
        $roundId = ($request->round_id) ? $request->round_id : $round->currentRoundId();
        $round = $rounds->where('id', $roundId)->first();

        Debugbar::info('Incoming request: ', $request->round_id);
        Debugbar::info('Round: ', $round->id);

        return view('admin.dashboard', compact('priorities', 'rounds', 'round', 'wishes'));
    }
}
