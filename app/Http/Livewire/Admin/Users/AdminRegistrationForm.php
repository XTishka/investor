<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Actions\Fortify\PasswordValidationRules;

class AdminRegistrationForm extends Component
{
    use PasswordValidationRules;

    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ];
    }

    public function storeAdministrator()
    {
        $this->validate();

        try {
            User::factory()->create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'is_admin' => 1
            ]);
        } catch (\Throwable $th) {
            $this->message = true;
            session()->flash('form_save__error', __('Error! Data has not beed saved'));
        }

        return redirect()->route('admin.administrators');
    }

    public function render()
    {
        return view('livewire.admin.users.admin-registration-form');
    }
}
