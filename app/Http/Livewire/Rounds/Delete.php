<?php

namespace App\Http\Livewire\Rounds;

use Livewire\Component;
use App\Models\Round;
use App\Models\User;
use App\Models\Wish;

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
        if ($this->confirm === true) {
            Wish::query()->where('round_id', $this->round->id)->delete();
            $this->round->users()->detach();
            $this->round->delete();
            $this->emit('roundDeleteConfirmed');
        } else {
            $this->emit('roundDeleteNotConfirmed');
        }

        $this->reset(['round']);
        $this->emit('refreshTable');
        $this->modal = false;
    }

    public function render()
    {
        return view('livewire.rounds.delete');
    }
}
