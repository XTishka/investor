<?php

namespace App\Http\Livewire\Wishes;

use Livewire\Component;
use App\Models\Property;
use App\Models\Wish;
use App\Services\RoundServices;
use App\Services\WishService;
use App\Models\User;
use App\Services\RoundService;

class Edit extends Component
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

    protected $listeners = ['openEditModal' => 'openModal'];

    public function mount()
    {
        $service = new RoundServices;
        $this->groupedRounds = $service->getGroupedRounds();
        $this->properties = Property::all();
    }

    public function openModal(Wish $wish)
    {
        $this->modal = true;
        $this->wish  = [
            'id'             => $wish->id,
            'round_id'       => $wish->round_id,
            'stockholder_id' => $wish->user_id,
            'property_id'    => $wish->property_id,
            'week_code'      => $wish->week_code,
            'status'         => $wish->status,
            'limit'          => null,
            'used'           => null,
            'duplicate'      => null,
        ];
    }

    public function closeModal()
    {
        $this->modal = false;
        $this->reset(['wish', 'field', 'warnings']);
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
        if ($this->wish['status'] == 'confirmed') :
            $wishService->updateRoundWishesStatusByStatus($this->wish, 'confirmed', 'failed');
        endif;
        if ($this->wish['status'] == 'overlimit_confirmed') :
            $wishService->updateRoundWishesStatusByStatus($this->wish, 'overlimit_confirmed', 'overlimit_failed');
        endif;
        $wish = Wish::query()->find($this->wish['id']);
        if ($wish) {
            $wish->update([
                'round_id'    => $this->wish['round_id'],
                'user_id'     => $this->wish['stockholder_id'],
                'property_id' => $this->wish['property_id'],
                'week_code'   => $this->wish['week_code'],
                'status'      => $this->wish['status'],
            ]);
            activity('edit_wish')->log('Administrator[' . auth()->id() . '] ' . auth()->user()->name . ' edited wish[' . $wish->id . ']');
        }

        $this->closeModal();
        $this->emit('wishSaveSuccess');
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

        $this->reset('warnings');
        $this->checkOverlimits();
        $this->checkForDuplicates();
        return view('livewire.wishes.edit');
    }

    public function checkOverlimits()
    {
        if ($this->field['property'] === true) :
            $roundService       = new RoundService;
            $roundId            = $this->wish['round_id'];
            $usedWishesPlusOne  = $this->wish['used'] + 1;
            $wishesLimit        = $this->wish['limit'];
            $roundOverlimit     = $roundService->roundHasOverLimits($roundId);

            if ($roundOverlimit == null and ($usedWishesPlusOne > $wishesLimit)) :
                $this->warnings[] = 'This round doesn\'t  have overlimits, but wishes quantity is greater than limit.';
            endif;
        endif;
    }

    public function checkForDuplicates()
    {
        if ($this->field['status'] === true and (($this->wish['status'] == 'confirmed') or ($this->wish['status'] == 'overlimit_confirmed'))) :
            $wishService = new WishService;
            $wish = $wishService->checkForConfirmedDuplicates($this->wish);
            if ($wish) :
                $stockholder = User::find($wish->user_id);
                if ($wish) :
                    $this->wish['duplicate'] = $wish->id;
                    $newStatus = ($wish->status == 'confirmed') ? 'failed' : 'overlimit_failed';
                    $this->warnings[] = 'Another stockholder, ' . $stockholder->name . ', has wish with such parameters. If you save, his wish status would be changed to ' . $newStatus;
                endif;
            endif;
        endif;
    }
}
