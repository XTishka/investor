<?php

namespace App\Http\Livewire\Admin\Rounds;

use App\Models\Round;
use Livewire\Component;
use Livewire\WithPagination;

class RoundIndexTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $rounds = Round::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(10);
        return view('livewire.admin.rounds.round-index-table', compact('rounds'));
    }
}
