<?php

namespace App\Http\Livewire;

use App\Models\Priority;
use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\ActiveRoundTrait;
class StockholdersTable extends Component
{
    use ActiveRoundTrait;

    public $stockholders;
    public $maxPriority;

    public function render(User $stockholders, Request $request)
    {
        $roundId = ($request->round_id) ? $request->round_id : $this->activeRound()->id;
        $stockholders = $stockholders->getStockholdersWithPriorityAndRound($roundId);
        return view('livewire.stockholders-table', compact('stockholders'));
    }

    public function updateStockholdersPriority($priorities)
    {
        foreach ($priorities as $priority) {
            Priority::find($priority['value'])->update(['priority' => $priority['order']]);
        }
    }
}
