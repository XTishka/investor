<?php

namespace App\Http\Livewire\Rounds;

use Livewire\Component;
use App\Models\Round;

class Delete extends Component
{
    public $modal = false;
    public $round;
    public $confirm;

    protected $listeners = ['openDeleteModal' => 'openModal'];

    public function openModal(Round $round)
    {
        $this->round = $round;
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->reset(['round']);
        $this->modal = false;
    }

    public function delete()
    {
        if ($this->confirm === true) $this->round->delete();

        $this->reset(['round']);
        $this->emit('roundDeleted');
        $this->emit('refreshTable');
        $this->modal = false;
    }

    public function render()
    {
        return view('livewire.rounds.delete');
    }
}
