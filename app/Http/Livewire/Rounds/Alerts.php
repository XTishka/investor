<?php

namespace App\Http\Livewire\Rounds;

use Livewire\Component;

class Alerts extends Component
{
    protected $listeners = [
        'roundCreateSuccess',
        'roundCreateError',
        'roundUpdateSuccess',
        'roundUpdateError',
        'roundDeleteConfirmed',
        'roundDeleteNotConfirmed',
    ];

    public function roundCreateSuccess()
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => __('Round was successfully created')
        ]);
    }

    public function roundCreateError()
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'error',
            'message' => __('Something went wrong in the creation of the round')
        ]);
    }

    public function roundUpdateSuccess()
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => __('Round was successfully updated')
        ]);
    }

    public function roundUpdateError()
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'error',
            'message' => __('Something went wrong while round update')
        ]);
    }

    public function roundDeleteConfirmed()
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'info',
            'message' => __('Round was deleted')
        ]);
    }

    public function roundDeleteNotConfirmed()
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'warning',
            'message' => __('Round was not deleted')
        ]);
    }

    public function render()
    {
        return view('livewire.rounds.alerts');
    }
}
