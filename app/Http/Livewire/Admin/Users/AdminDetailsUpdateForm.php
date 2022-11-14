<?php

namespace App\Http\Livewire\Admin\Users;

use Exception;
use Livewire\Component;
use Illuminate\Validation\Rule;

class AdminDetailsUpdateForm extends Component
{
    public $administrator;
    public $name;
    public $email;
    public bool $message = false;

    public function mount()
    {
        $this->name = $this->administrator->name;
        $this->email = $this->administrator->email;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->administrator->id)],
        ];
    }

    public function updateUserDetails()
    {
        $this->validate();

        try {
            $this->administrator->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            $this->message = true;
            session()->flash('update_user_details', __('User details successfully updated'));
        } catch (Exception $e) {
            $this->message = true;
            session()->flash('form_save__error', __('Error! Data has not beed saved'));
        }
    }

    public function render()
    {
        return view('livewire.admin.users.admin-details-update-form', ['name' => $this->administrator->name]);
    }
}
