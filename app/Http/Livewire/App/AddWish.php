<?php

namespace App\Http\Livewire\App;

use Livewire\Component;
use App\Models\Wish;

class AddWish extends Component
{
    public $modal = false;
    public $round;
    public $stockholder;
    public $property;
    public $week;

    public function openModal()
    {
        $this->modal = true;
        debugbar()->info($this->round->start_date);
    }

    public function closeModal()
    {
        $this->modal = false;
        $this->reset(['property', 'week']);
    }

    public function rules()
    {
        return [
            'property' => 'required|numeric',
            'week' => 'required|numeric',
        ];
    }

    public function save()
    {
        $this->validate();

        $wishes = Wish::query()
            ->where('user_id', $this->stockholder->id)
            ->where('round_id', $this->round->id)
            ->where('property_id', $this->property)
            ->where('week_code', $this->week)
            ->exists();

        if ($wishes === false) {
            Wish::query()->create([
                'user_id' => $this->stockholder->id,
                'round_id' => $this->round->id,
                'property_id' => $this->property,
                'week_code' => $this->week,
            ]);
        }

        $this->emit('updateTable');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.app.add-wish');
    }
}
