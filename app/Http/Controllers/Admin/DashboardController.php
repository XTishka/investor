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
use App\Http\Traits\ActiveRoundTrait;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{

    use ActiveRoundTrait;

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
        $roundId = ($request->round_id) ? $request->round_id : $this->activeRound()->id;
        $round = $rounds->where('id', $roundId)->first();
        $weeks = Week::whereRoundId($roundId)->get();
        $weeksCount = Week::whereRoundId($roundId)->count();
        $priorities = Priority::whereRoundId($roundId)->get();

        return view('admin.dashboard', compact('priorities', 'rounds', 'round', 'weeks', 'wishes', 'weeksCount'));
    }

    public function distribute(Round $round, AutomaticDistributionAction $action)
    {
        $action->handle($round);
        return back();
    }

    public function export(Request $request)
    {
        return Excel::download(new DistributionExport($request->round_id), $request->round_name . '_distribution.csv');
    }
}
