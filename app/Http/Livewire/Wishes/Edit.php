<?php

namespace App\Http\Livewire\Wishes;

use Livewire\Component;
use App\Models\Property;
use App\Models\Wish;
use App\Services\RoundServices;

class Edit extends Component
{
    public $modal = false;
    public $wish;
    public $groupedRounds = [];
    public $round = null;
    public $stockholder = null;
    public $properties;
    public $property = null;
    public $week;
    public $status;

    protected $listeners = ['openEditModal' => 'openModal'];

    public function mount()
    {
        $service = new RoundServices;
        $this->groupedRounds = $service->getGroupedRounds();
        $this->properties = Property::all();
    }

    public function openModal(Wish $wish)
    {
        $this->wish         = $wish;
        $this->modal        = true;
        $this->round        = $wish->round_id;
        $this->stockholder  = $wish->user_id;
        $this->property     = $wish->property_id;
        $this->week         = $wish->week_code;
        $this->status       = $wish->status;
    }

    public function closeModal()
    {
        $this->modal = false;
        $this->reset(['round', 'stockholder', 'property', 'week']);
    }

    public function save()
    {
        $wish = Wish::query()->find($this->wish->id);

        if ($wish) {
            $wish->update([
                'round_id' => $this->round,
                'user_id' => $this->stockholder,
                'property_id' => $this->property,
                'week_code' => $this->week,
                'status' => $this->status,
            ]);
        }

        $this->closeModal();
        $this->emit('wishSaveSuccess');
        $this->emit('updateTable');
    }

    public function render()
    {
        return view('livewire.wishes.edit');
    }
}
