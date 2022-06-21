<?php

namespace App\Http\Livewire;

use App\Models\Priority;
use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\ActiveRoundTrait;
use App\Models\Round;
use Debugbar;

class StockholdersTable extends Component
{
    use ActiveRoundTrait;

    public $search = '';

    public function render(User $stockholders, Request $request)
    {
        $rounds = Round::all();
        $roundId = ($request->round_id) ? $request->round_id : $this->activeRound()->id;
        $round = $rounds->where('id', $roundId)->first();
        $stockholders = $stockholders->searchStockholdersWithPriorityAndRound($roundId, $this->search);
        return view('livewire.stockholders-table', compact('stockholders', 'round', 'rounds'));
    }
}
