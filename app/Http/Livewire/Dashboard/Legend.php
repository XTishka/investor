<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Legend extends Component
{
    public $modal = false;

    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function render()
    {
        return view('livewire.dashboard.legend');
    }
}
