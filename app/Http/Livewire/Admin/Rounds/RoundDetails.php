<?php

namespace App\Http\Livewire\Admin\Rounds;

use Livewire\Component;
use App\Services\Weeks;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Carbon;

class RoundDetails extends Component
{
    public $round;

    public function render(Weeks $weeks)
    {
        Debugbar::info($weeks->count($this->round->start_date, $this->round->end_date));
        return view('livewire.admin.rounds.round-details', [
            'roundWeeks' => $weeks->roundArray($this->round->start_date, $this->round->end_date),
            'roundStopWishesDate' => Carbon::parse($this->round->stop_wishes_date)->format('j F, Y'),
            'roundStartDate' => Carbon::parse($this->round->start_date)->format('j F, Y'),
            'roundEndDate' => Carbon::parse($this->round->end_date)->format('j F, Y'),
        ]);
    }
}