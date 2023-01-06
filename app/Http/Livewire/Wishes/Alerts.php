<?php

namespace App\Http\Livewire\Wishes;

use Livewire\Component;

class Alerts extends Component
{
    protected $listeners = [
        'wishCreateSuccess',
        'wishSaveSuccess',
        'wishDeleted',
    ];

    public function wishCreateSuccess()
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => __('Wish was successfully added')
        ]);
    }


    public function wishSaveSuccess()
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => __('Wish was successfully updated')
        ]);
    }

    public function wishDeleted()
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'info',
            'message' => __('Wish was deleted')
        ]);
    }

    public function render()
    {
        return view('livewire.stockholders.alerts');
    }
}
