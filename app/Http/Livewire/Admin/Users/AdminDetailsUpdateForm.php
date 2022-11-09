<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;

class AdminDetailsUpdateForm extends Component
{
    public $administrator;

    public function render()
    {
        return view('livewire.admin.users.admin-details-update-form');
    }
}
