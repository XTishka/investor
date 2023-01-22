<?php

namespace App\Http\Livewire\Stockholders;

use App\Services\RoundServices;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Actions\Stockholders\StoreAction;
use App\Actions\Stockholders\AddToRoundAction;
use App\Mail\SendPassword;
use Illuminate\Support\Facades\Mail;

class Create extends Component
{
    public $modal = false;
    public $stockholder = ['rounds' => []];
    public $groupedRounds = [];
    public $sendPassword = true;
    // public $rounds = [];

    protected $rules = [
        'stockholder.name'      => 'required|string|max:255',
        'stockholder.email'     => 'required|string|email|max:255|unique:users,email',
        'stockholder.password'  => 'required|string|min:8|regex:/(^[a-zA-Z]+[a-zA-Z0-9\\-]*)/u',
    ];

    public function mount()
    {
        $service = new RoundServices;
        $this->groupedRounds = $service->getGroupedRounds();
    }

    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
        $this->reset(['stockholder']);
    }

    public function save()
    {
        $this->validate();
        $stockholder = $this->storeStockoholder();
        if ($stockholder) {
            $this->storeStockholdersWishes($stockholder->id, $this->stockholder['rounds']);
            $this->emit('stockholderSaveSuccess');
        } else {
            $this->emit('stockholderSaveError');
        }

        // Send email
        if ($this->sendPassword == true) {
            try {
                Mail::to($this->stockholder['email'])->queue(new SendPassword($this->stockholder, $this->stockholder['password']));
            } catch (\Throwable $th) {
                $this->emit('emailSentError');
            }
        }

        $this->reset(['stockholder']);
        $this->emit('stockholdersUpdated');
        $this->modal = false;
    }

    public function generatePassword()
    {
        $this->stockholder['password'] = Str::random(16);
    }

    public function storeStockoholder()
    {
        $createStockholder = new StoreAction;
        return $createStockholder->handle(
            $this->stockholder['name'],
            $this->stockholder['email'],
            $this->stockholder['password']
        );
    }

    public function storeStockholdersWishes($userId, $rounds)
    {
        foreach ($rounds as $roundId => $wishes) {
            $action = new AddToRoundAction;
            $save = $action->handle($userId, $roundId, $wishes);
            if ($save == false) $this->emit('wishSaveError');
        }
    }

    public function render()
    {
        return view('livewire.stockholders.create');
    }
}
