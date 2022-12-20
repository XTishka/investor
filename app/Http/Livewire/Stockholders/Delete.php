<?php

namespace App\Http\Livewire\Stockholders;

use App\Models\Round;
use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;

class Delete extends Component
{
    public $modal = false;
    public $stockholder;
    public $type = 'round';
    public $round;

    protected $listeners = ['openDeleteModal' => 'openModal'];

    public function openModal(User $stockholder, Request $request)
    {
        $this->stockholder = $stockholder;
        $this->round = Round::query()->find($request->session()->get('active_round'));
        if (!$this->round) $this->type = 'all_rounds';
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->reset(['stockholder']);
        $this->modal = false;
    }

    public function delete()
    {
        if ($this->type == 'round') $this->stockholder->rounds()->detach($this->round->id);
        if ($this->type == 'all_rounds') $this->stockholder->rounds()->detach();
        if ($this->type == 'account') {
            $this->stockholder->rounds()->detach();
            $this->stockholder->delete();
        }

        $this->reset(['stockholder']);
        $this->emit('stockholdersUpdated');
        $this->modal = false;
    }

    public function render()
    {
        return view('livewire.stockholders.delete');
    }
}
