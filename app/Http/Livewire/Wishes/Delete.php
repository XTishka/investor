<?php

namespace App\Http\Livewire\Wishes;

use Livewire\Component;
use App\Models\Wish;

class Delete extends Component
{
    public $modal = false;
    public $wish;
    public $confirm;

    protected $listeners = ['openDeleteModal' => 'openModal'];

    public function openModal(Wish $wish)
    {
        $this->wish = $wish;
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->reset(['wish']);
        $this->modal = false;
    }

    public function delete()
    {
        if ($this->confirm === true) $this->wish->delete();

        $this->reset(['wish']);
        $this->emit('wishDeleted');
        $this->emit('updateTable');
        $this->modal = false;
    }
    public function render()
    {
        return view('livewire.wishes.delete');
    }
}
