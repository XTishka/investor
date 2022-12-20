<?php

namespace App\Http\Livewire\Stockholders;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetPassword extends Component
{
    public $modal = false;
    public $stockholder;
    public $password;
    public $sendPassword = true;

    protected $listeners = ['openResetPasswordModal' => 'openModal'];

    public function openModal(User $stockholder)
    {
        $this->stockholder = $stockholder;
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->reset(['password']);
        $this->modal = false;
    }

    public function resetPassword()
    {
        $this->validate([
            'password'  => 'required|string|min:8|regex:/(^[a-zA-Z]+[a-zA-Z0-9\\-]*)/u',
        ]);
        $this->stockholder->update(['password' => Hash::make($this->password)]);
        $this->closeModal();
        $this->emit('updatePasswordSuccess');
    }

    public function generatePassword()
    {
        $this->password = Str::random(16);
    }

    public function render()
    {
        return view('livewire.stockholders.reset-password');
    }
}
