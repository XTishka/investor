<?php

namespace App\Http\Controllers\Admin;

use App\Actions\AutomaticDistributionAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Round;
use App\Models\Priority;
use App\Models\Wish;
use App\Models\Week;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Exports\UsersExport;
use App\Exports\DistributionExport;
use Maatwebsite\Excel\Facades\Excel;

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
    public function index(Request $request, User $stockholders, Round $round, Wish $wishes, Week $week)
    {
        $rounds = Round::all();
        $roundId = ($request->round_id) ? $request->round_id : $round->currentRoundId();
        $round = $rounds->where('id', $roundId)->first();
        $weeks = Week::where('round_id', $roundId)->get();
        $weeksCount = Week::where('round_id', $roundId)->count();
        $priorities = Priority::where('round_id', $roundId)->get();

        return view('admin.dashboard', compact('priorities', 'rounds', 'round', 'weeks', 'wishes', 'weeksCount'));
    }

    public function distribute(Round $round, AutomaticDistributionAction $action) {
        $wishes = $action->handle($round);
        return view('admin.distribute', compact('wishes'));
        // return back();
    }

    public function export(Request $request)
    {
        return Excel::download(new DistributionExport($request->round_id), $request->round_name . '_distribution.csv');
    }
}
