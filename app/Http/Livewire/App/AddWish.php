<?php

namespace App\Http\Livewire\App;

use Livewire\Component;
use App\Models\User;
use App\Services\RoundServices;
use App\Models\Wish;

class AddWish extends Component
{
    public $addWishButton;
    public $modal = false;
    public $round;
    public $stockholder;
    public $property;
    public $week;
    public $maxWishes;
    public $wishCount;
    public $usedWishes;

    protected $listeners = ['wishDeleted' => 'addWishButtonStatus'];

    public function mount(User $stockholder)
    {
        $this->maxWishes = $stockholder->pivot->wishes;
    }

    public function addWishButtonStatus()
    {
        $roundService = new RoundServices;
        $this->round = $roundService->getActiveRound();
        if ($this->round->active == true) :
            $this->addWishButton = ($this->round->inWishesRange == 1) ? true : false;
            if ($this->round->overlimit == 0) :

                $this->usedWishes = Wish::query()
                    ->where('round_id', $this->round->id)
                    ->where('user_id', $this->stockholder->id)
                    ->count();

                $this->addWishButton = (($this->maxWishes - $this->usedWishes) > 0) ? true : false;
            endif;
        endif;
    }

    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
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
        $this->addWishButtonStatus();
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

    public function render()
    {
        $this->addWishButtonStatus();
        return view('livewire.app.add-wish');
    }
}
