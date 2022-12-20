<?php

namespace App\Http\Livewire\Stockholders;

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Services\RoundServices;
use App\Actions\Stockholders\AddToRoundAction;
use App\Actions\Stockholders\UpdateWishesAction;
use App\Models\Round;
use Exception;

class Edit extends Component
{
    public $stockholder;
    public $name;
    public $email;
    public $modal = false;
    public $rounds = [];
    public $groupedRounds;

    protected $listeners = ['openEditModal' => 'openModal'];

    public function mount()
    {
        $service = new RoundServices;
        $this->groupedRounds = $service->getGroupedRounds();
    }

    public function openModal(User $stockholder)
    {
        $service = new RoundServices;
        $this->stockholder = $stockholder;
        $this->name = $this->stockholder->name;
        $this->email = $this->stockholder->email;
        $this->rounds = $service->getGroupedRoundWishes($stockholder->id);
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
        $this->reset(['stockholder']);
    }

    public function save()
    {
        $updateStockholder = $this->updateStockholder();
        $updateWishes = $this->updateWishes($this->stockholder->id, $this->rounds);
        if ($updateStockholder == true) $this->emit('updateStockholderSuccess');
        $this->reset(['stockholder']);
        $this->emit('stockholdersUpdated');
        $this->modal = false;
    }

    public function updateStockholder()
    {
        // TODO::Move stockholder update to App\Actions\Stockholders\UpdateAction;
        try {
            $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->stockholder['id'])],
            ]);

            $this->stockholder->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function updateWishes($userId, $rounds)
    {
        $action = new UpdateWishesAction;
        $action->handle($userId, $rounds);
    }

    public function render()
    {
        return view('livewire.stockholders.edit');
    }
}
