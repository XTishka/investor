<?php

namespace App\Http\Livewire\App;

use Livewire\Component;
use App\Models\Wish;
use App\Models\Round;
use App\Models\User;
use App\Services\RoundServices;

class AddWish extends Component
{
    public $modal = false;
    public $addWishButton = false;
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
        $roundService = new RoundServices;
        $this->round = $roundService->getActiveRound();
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
        $status = false;
        if ($this->round->active == true) :
            $status = ($this->round->inWishesRange == 1) ? true : false;
            if ($this->round->overlimit == 0) :

                $this->usedWishes = Wish::query()
                    ->where('round_id', $this->round->id)
                    ->where('user_id', $this->stockholder->id)
                    ->count();

                $status = (($this->maxWishes - $this->usedWishes) > 0) ? true : false;
            endif;
        endif;
        return $status;
    }

    public function render()
    {
        $this->addWishButton = $this->buttonStatus();
        return view('livewire.app.add-wish');
    }
}
