<?php

namespace App\Http\Controllers\Admin;

use App\Exports\StockholdersFullExport;
use App\Exports\StockholdersRoundExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ImportStockholdersRequest;
use App\Http\Requests\admin\StoreStockholderRequest;
use App\Http\Requests\admin\UpdateStockholderRequest;
use App\Imports\StockholdersImport;
use App\Models\Priority;
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
use App\Http\Traits\ActiveRoundTrait;
use Carbon\Carbon;
use Illuminate\Support\Str;

class StockholderController extends Controller
{
    use ActiveRoundTrait;

    public $timestamp;
    public $roundId;

    public function __construct(Request $request)
    {
        $this->timestamp = now()->timestamp;
        $this->roundId = ($request->round_id) ? $request->round_id : $this->activeRound()->id;
    }

    public function index(Request $request, User $users, Round $round, Priority $priorities): Application|Factory|View
    {
        $rounds = $round->all();
        $round = $rounds->where('id', $this->roundId)->first();
        $maxPriority = $priorities->where('round_id', $this->roundId)->max('priority');
        return view('admin.stockholders.index', compact('maxPriority', 'rounds', 'round'));
    }


    public function create(): Application|Factory|View
    {
        $random_password = Str::random(8);
        $rounds = Round::whereDate('end_wishes_date', '>', Carbon::today()->toDateString())
            ->orderBy('end_wishes_date')
            ->get();
        return view('admin.stockholders.create', compact('rounds', 'random_password'));
    }


    public function store(StoreStockholderRequest $request): RedirectResponse
    {
        $stockholder = User::where('email', $request->email)->first();
        if (!$stockholder) {
            $stockholder = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);
        }

        $minPriority = Priority::where('round_id', $request->round)->max('priority');
        Priority::create([
            'user_id' => $stockholder->id,
            'round_id' => $request->round,
            'available_weeks' => $request->available_weeks,
            'priority' => $minPriority + 1,
        ]);

        if ($request->send_password == 'on') {
            $mail = new MailController();
            $mail->newUser($request);
        }

        $priority = Priority::where('round_id', $request->round)->where('user_id', $stockholder->id)->first();
        if (!$priority) {
            $minPriority = Priority::where('round_id', $request->round)->max('priority');
            Priority::create([
                'user_id' => $stockholder->id,
                'round_id' => $request->round,
                'available_weeks' => $request->available_weeks,
                'priority' => $minPriority + 1,
            ]);
        }

        return redirect()->route('admin.stockholders');
    }


    public function show(User $stockholder, Wish $wish): Application|Factory|View
    {
        return view('admin.stockholders.show', compact('stockholder'));
    }


    public function edit(User $stockholder): View|Factory|Application
    {
        $rounds = Round::all()->sortBy('end_wishes_date');
        $priorities = Priority::where('user_id', $stockholder->id)->get();
        return view('admin.stockholders.edit', compact('stockholder', 'rounds', 'priorities'));
    }


    public function update(UpdateStockholderRequest $request, User $stockholder): RedirectResponse
    {
        $stockholder->name = $request['name'];
        $stockholder->email = $request['email'];

        $stockholder->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);

        return redirect()->route('admin.stockholders.show', $stockholder);
    }

    public function updatePriorities(Request $request)
    {
        foreach ($request->all() as $round => $weeks) {
            if (Str::contains($round, 'round_') == true) {
                $stockholderId = $request->stockholder_id;
                $roundId = Str::remove('round_', $round);
                $priority = Priority::where('user_id', $stockholderId)->where('round_id', $roundId)->first();
                if ($priority) {
                    $priority->update(['available_weeks' => $weeks]);
                } else {
                    $minPriority = Priority::where('round_id', $roundId)->max('priority');
                    Priority::create([
                        'user_id' => $stockholderId,
                        'round_id' => $roundId,
                        'available_weeks' => $weeks,
                        'priority' => $minPriority + 1,
                    ]);
                }
            }
        }
        return redirect()->back();
    }


    public function destroy(User $stockholder): RedirectResponse
    {
        Priority::where('user_id', $stockholder->id)->where('round_id', $this->roundId)->delete();
        return redirect()->route('admin.stockholders');
    }

    public function order(Request $request)
    {
        foreach ($request->order as $position => $priority) {
            $priorityID = str_replace('priority-', '', $priority);
            Priority::find($priorityID)->update(['priority' => $position + 1]);
        }
    }

    public function import(ImportStockholdersRequest $request)
    {
        Priority::where('round_id', $request->round)->delete();
        Excel::import(new StockholdersImport($request->round), $request->file('file')->store('temp'));
        return redirect()->route('admin.stockholders');
    }

    public function exportFull()
    {
        return Excel::download(new StockholdersFullExport, 'stockholders_' . $this->timestamp . '.csv');
    }

    public function exportRound()
    {
        return Excel::download(new StockholdersRoundExport($this->roundId), 'stockholders_' . Round::find($this->roundId)->value('name') . '_' . $this->timestamp . '.csv');
    }
}
