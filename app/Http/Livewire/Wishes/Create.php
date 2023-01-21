<?php

namespace App\Http\Livewire\Wishes;

use App\Models\Property;
use App\Services\RoundService;
use Livewire\Component;
use App\Services\RoundServices;
use App\Services\WishService;
use App\Models\User;
use App\Models\Wish;

class Create extends Component
{

    public $modal = false;
    public $groupedRounds = [];
    public $properties;
    public $warnings = [];
    public $wish = [
        'round_id'       => null,
        'stockholder_id' => null,
        'property_id'    => null,
        'week_code'      => null,
        'status'         => 'waiting',
        'limit'          => null,
        'used'           => null,
        'duplicate'      => null,
    ];
    public $field = [
        'round'       => true,
        'stockholder' => false,
        'property'    => false,
        'week'        => false,
        'status'      => false,
    ];

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
        $this->reset(['wish', 'field']);
    }

    public function rules()
    {
        return [
            'wish.round_id'       => 'required|numeric',
            'wish.stockholder_id' => 'required|numeric',
            'wish.property_id'    => 'required|numeric',
            'wish.week_code'      => 'required|numeric',
            'wish.status'         => 'required',
        ];
    }

    public function save()
    {
        $this->validate();
        $wishService = new WishService;
        if ($this->wish['duplicate'] != null) :
            $duplicate = Wish::find($this->duplicate);
            $newStatus = ($duplicate->status == 'confirmed') ? 'failed' : 'overlimit_failed';
            $wishService->updateWishStatusById($this->wish['duplicate'], $newStatus);
        endif;
        $wishService->createWish($this->wish);

        $this->closeModal();
        $this->emit('wishCreateSuccess');
        $this->emit('updateTable');
    }

    public function fieldsStatus()
    {
        if ($this->wish['round_id'] == null) $this->reset(['wish', 'field']);
        if ($this->wish['round_id'] != null) $this->field['stockholder'] = true;
        if ($this->wish['stockholder_id'] != null) $this->field['property'] = true;
        if ($this->wish['property_id'] != null) $this->field['week'] = true;
        if ($this->wish['week_code'] != null) $this->field['status'] = true;
    }

    public function render()
    {
        $this->fieldsStatus();
        if ($this->wish['stockholder_id'] != null) :
            $wishService         = new WishService;
            $this->wish['limit'] = $wishService->getStockholderWishLimit($this->wish['round_id'], $this->wish['stockholder_id']);
            $this->wish['used']  = $wishService->getStockholderUsedWishesQty($this->wish['round_id'], $this->wish['stockholder_id']);
        endif;
        debugbar()->info($this->wish);
        $this->checkOverlimits();
        return view('livewire.wishes.create');
    }

    public function checkOverlimits()
    {
        $roundService       = new RoundService;
        $roundId            = $this->wish['round_id'];
        $usedWishesPlusOne  = $this->wish['used'] + 1;
        $wishesLimit        = $this->wish['limit'];
        $roundOverlimit     = $roundService->roundHasOverLimits($roundId);

        if ($roundOverlimit == false and ($usedWishesPlusOne > $wishesLimit)) :
            $this->warnings[] = 'This round doesn\'t  have overlimits, but wishes quantity is greater than limit.';
        endif;
    }

    public function checkForDuplicates()
    {
        $wishService = new WishService;
        $wish = $wishService->checkForConfirmedDuplicates($this->wish);
        $stockholder = User::find($wish->user_id);
        if ($wish) :
            $this->wish['duplicate'] = $wish->id;
            $newStatus = ($wish->status == 'confirmed') ? 'failed' : 'overlimit_failed';
            $this->warnings[] = 'Another stockholder, ' . $stockholder->name . ', has wish with such parameters. If you save, his wish status would be changed to ' . $newStatus;
        endif;
    }
}
