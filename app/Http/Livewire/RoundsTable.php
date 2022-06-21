<?php

namespace App\Http\Livewire;

use App\Models\Round;
use Livewire\Component;

class RoundsTable extends Component
{
    public $search;

    public function render()
    {
        $rounds = Round::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->get();
        return view('livewire.rounds-table', compact('rounds'));
    }
}
