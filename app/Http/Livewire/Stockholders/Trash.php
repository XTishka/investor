<?php

namespace App\Http\Livewire\Stockholders;

use App\Models\User;
use Livewire\Component;

class Trash extends Component
{
    public $modal = false;

    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function restore($id)
    {
        $stockholder = User::onlyTrashed()->find($id);
        $stockholder->restore();
    }

    public function delete($id)
    {
        $stockholder = User::onlyTrashed()->find($id);
        $stockholder->forceDelete();
    }

    public function render()
    {
        $stockholders = User::onlyTrashed()->where('is_admin', 0)->get();
        return view('livewire.stockholders.trash', compact('stockholders'));
    }
}
