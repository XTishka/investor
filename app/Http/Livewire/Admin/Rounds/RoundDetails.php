<?php

namespace App\Http\Livewire\Admin\Rounds;

use Livewire\Component;
use App\Services\Weeks;
use Barryvdh\Debugbar\Facades\Debugbar;

class RoundDetails extends Component
{
    public $round;

    public function render(Weeks $weeks)
    {
        $roundWeeks = $weeks->roundArray('2022-10-01', '2022-12-01');
        return view('livewire.admin.rounds.round-details', compact('roundWeeks'));
    }
}