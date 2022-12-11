<?php

namespace App\Http\Livewire\Admin\Stockholders;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $search;
    public $name;
    public $email;

    public function render()
    {
        $stockholders = User::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy('name')
            ->paginate(10);

        return view('livewire.admin.stockholders.index', compact('stockholders'));
    }
}
