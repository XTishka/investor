<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use App\Actions\Fortify\PasswordValidationRules;
use Exception;
use Illuminate\Support\Facades\Hash;

class AdminPasswordUpdateForm extends Component
{
    use PasswordValidationRules;

    public $administrator;
    public $password;
    public $password_confirmation;

    public function rules()
    {
        return [
            'password' => $this->passwordRules(),
        ];
    }

    public function updateUserPassword() {
        $this->validate();

        try {
            $this->administrator->update([
                'password' => Hash::make($this->password),
            ]);
            $this->message = true;
            session()->flash('user_password_update__success', 'The user\'s password was successfully updated.');
        } catch (Exception $e) {
            $this->message = true;
            session()->flash('form_save__error', __('Error! Data has not beed saved'));
        }
    }

    public function render()
    {
        return view('livewire.admin.users.admin-password-update-form');
    }
}
