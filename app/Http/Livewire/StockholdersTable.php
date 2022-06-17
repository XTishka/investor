<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StockholdersTable extends Component
{
    public $stockholders;
    public $maxPriority;

    public function render()
    {
        return view('livewire.stockholders-table');
    }

    public function updateStockholdersPriority($stockholder)
    {
        dd($stockholder);
    }
}
