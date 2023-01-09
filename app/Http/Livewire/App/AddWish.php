<?php

namespace App\Http\Livewire\App;

use Livewire\Component;
use App\Models\Wish;
use App\Models\Round;
use App\Models\User;

class AddWish extends Component
{
    public $modal = false;
    public $button = false;
    public $round;
    public $stockholder;
    public $property;
    public $week;
    public $usedWishes;
    public $maxWishes;

    protected $listeners = ['wishDeleted' => 'buttonStatus'];

    public function mount(User $stockholder)
    {
        $this->maxWishes = $stockholder->pivot->wishes;
    }

    public function openModal()
    {
        $this->modal = true;
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
        if ($this->wishExist() === false) {
            Wish::query()->create([
                'user_id' => $this->stockholder->id,
                'round_id' => $this->round->id,
                'property_id' => $this->property,
                'week_code' => $this->week,
                'priority' => $this->wishesCount() + 1,
            ]);
        }

        $this->emit('updateTable');
        $this->buttonStatus();
        $this->closeModal();
    }

    public function wishExist()
    {
        return Wish::query()
            ->where('user_id', $this->stockholder->id)
            ->where('round_id', $this->round->id)
            ->where('property_id', $this->property)
            ->where('week_code', $this->week)
            ->exists();
    }

    public function wishesCount()
    {
        return Wish::query()
            ->where('user_id', $this->stockholder->id)
            ->where('round_id', $this->round->id)
            ->count();
    }

    public function buttonStatus()
    {
        if ($this->maxWishes != 0) {
            $this->usedWishes = Wish::query()
                ->where('round_id', $this->round->id)
                ->where('user_id', $this->stockholder->id)
                ->count();
            if (($this->maxWishes - $this->usedWishes) > 0) {
                $this->button = true;
            } else {
                $this->button = false;
            }
        } else {
            $this->button = true;
        }
    }

    public function render()
    {
        $this->buttonStatus();
        return view('livewire.app.add-wish');
    }
}
