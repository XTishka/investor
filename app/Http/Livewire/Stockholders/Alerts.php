<?php

namespace App\Http\Livewire\Stockholders;

use Livewire\Component;

class Alerts extends Component
{
    protected $listeners = [
        'stockholderSaveSuccess',
        'stockholderSaveError',
        'updateStockholderSuccess',
        'updateStockholderError',
        'updateWishesError',
        'updatePasswordSuccess',
        'importReady',
    ];

    public function stockholderSaveSuccess()
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => __('Stockholder was successfully created')
        ]);
    }

    public function stockholderSaveError()
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'error',
            'message' => __('Error. Stockholder was not created')
        ]);
    }

    public function updateStockholderSuccess()
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => __('Stockholder details successfully updated'),
        ]);
    }

    public function updateStockholderError()
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'error',
            'message' => __('Error while stockholders details update'),
        ]);
    }

    public function updateWishesError()
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'error',
            'message' => __('Something went wrong on wishes save.')
        ]);
    }

    public function updatePasswordSuccess()
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => __('Password was successfully updated.'),
        ]);
    }

    public function importReady()
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => 'info',
            'message' => __('Import is done'),
        ]);
    }

    public function render()
    {
        return view('livewire.stockholders.alerts');
    }
}
