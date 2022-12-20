<?php

namespace App\Http\Livewire\Admin\Stockholders;

use Livewire\Component;

class Create extends Component
{
    public $modal_create = false;

    public function openModal()
    {
        $this->modal_create = true;
    }

    public function render()
    {
        return view('livewire.admin.stockholders.create');
    }
}
