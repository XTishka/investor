<?php

namespace App\Http\Livewire\Wishes;

use App\Models\Property;
use App\Models\Wish;
use Livewire\Component;
use App\Services\RoundServices;

class Create extends Component
{
    public $modal = false;
    public $wish;
    public $groupedRounds = [];
    public $round = null;
    public $stockholder = null;
    public $properties;
    public $property = null;
    public $week;

    public function mount()
    {
        $service = new RoundServices;
        $this->groupedRounds = $service->getGroupedRounds();
        $this->properties = Property::all();
    }

    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
        $this->reset(['round', 'stockholder', 'property', 'week']);
    }

    public function save()
    {
        $wishes = Wish::query()
            ->where('user_id', $this->stockholder)
            ->where('week_code', $this->week)
            ->where('round_id', $this->round)
            ->where('property_id', $this->property)
            ->exists();

        if ($wishes === false) {
            Wish::query()->create([
                'round_id' => $this->round,
                'user_id' => $this->stockholder,
                'property_id' => $this->property,
                'week_code' => $this->week,
            ]);
        }

        $this->closeModal();
        $this->emit('wishCreateSuccess');
        $this->emit('updateTable');
    }

    public function render()
    {
        return view('livewire.wishes.create');
    }
}
