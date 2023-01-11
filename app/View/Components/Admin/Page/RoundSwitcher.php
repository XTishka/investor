<?php

namespace App\View\Components\Admin\Page;

use App\Models\Round;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\View\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class RoundSwitcher extends Component
{
    public $roundsQty;
    public $activeRound;
    public $runningRounds;
    public $futureRounds;
    public $passedRounds;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->roundsQty = Round::all()->count();

        $activeRoundId = Session::get('active_round');
        $this->activeRound = Round::query()->find($activeRoundId);

        $this->runningRounds = Round::query()
            ->where('start_wishes_date', '<=', Carbon::now()->format('Y-m-d'))
            ->where('stop_wishes_date', '>=', Carbon::now()->format('Y-m-d'))
            ->get();

        $this->futureRounds = Round::query()
            ->where('start_wishes_date', '>=', Carbon::now()->format('Y-m-d'))
            ->get();

        $this->passedRounds = Round::query()
            ->where('stop_wishes_date', '<=', Carbon::now()->format('Y-m-d'))
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.page.round-switcher', [
            'roundsQty'     => $this->roundsQty,
            'runningRounds' => $this->runningRounds,
            'futureRounds'  => $this->futureRounds,
            'passedRounds'  => $this->passedRounds,
        ]);
    }
}
