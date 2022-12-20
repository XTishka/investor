<?php

namespace App\Http\Livewire\Stockholders;

use Livewire\Component;

class Mailing extends Component
{
    public $modal = false;

    public function openModal()
    {
        $this->modal = true;
    }

    public function render()
    {
        return view('livewire.stockholders.mailing');
    }
}