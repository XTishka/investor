<?php

namespace App\Http\Livewire;

use App\Models\Priority;
use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\ActiveRoundTrait;
use Debugbar;

class StockholdersTable extends Component
{
    use ActiveRoundTrait;

    public $search = '';

    public $round;

    public $rounds;

    public function render(User $stockholders, Request $request)
    {
        $roundId = ($request->round_id) ? $request->round_id : $this->activeRound()->id;
        $stockholders = $stockholders->getStockholdersWithPriorityAndRound($roundId, $this->search);
        return view('livewire.stockholders-table', compact('stockholders'));
    }
}
