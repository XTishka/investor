<?php

namespace App\Http\Livewire\App;

use Livewire\Component;
use App\Models\User;
use App\Services\RoundServices;
use App\Models\Wish;
use App\Repositories\RoundRepository;
use App\Repositories\WishRepository;

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
    public function addWishButtonStatus()
    {
        $status     = false;
        $service    = new RoundServices;
        $repository = new WishRepository;

        $round                = $service->getActiveRound();
        $stockholder          = $round->users()->where('id', $this->stockholder->id)->first();
        $usedWishes           = $repository->getUsersWishesInRound($round->id, $stockholder->id);
        $usersMaxWishes       = $stockholder->pivot->wishes;

        if ($round->active == true and $round->inWishesRange == true) $status = true;
        if ($status == true and $round->overlimit == false and $usedWishes >= $usersMaxWishes) $status = false;
        if ($status == true and $round->max_wishes != 0 and $usedWishes >= $round->max_wishes) $status = false;

        $this->addWishButton = $status;
    }

    public function save()
    {
        $this->validate();
        $repository = new WishRepository;

        $data = [
            'user_id'       => $this->stockholder->id,
            'round_id'      => $this->round->id,
            'property_id'   => $this->property,
            'week_code'     => $this->week,
            'priority'      => $this->wishesCount() + 1,
        ];

        if ($repository->wishExists($data) == null) :
            $wish = $repository->createWishWithArray($data);
            activity('add_wish')->log('User[' . auth()->id() . '] ' . auth()->user()->name . ' added wish [' . $wish->id . ']');
        endif;

        $this->emit('updateTable');
        $this->addWishButtonStatus();
        $this->closeModal();
    }

    public function render()
    {
        $this->addWishButtonStatus();
        return view('livewire.app.add-wish');
    }
}
