<?php

namespace App\Http\Livewire\Stockholders;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $search = '';
    public $roundId;
    public $perPage = 20;
    public $filter_stockholder;
    public $filter_round;
    public $filter_property;
    public $filter_status;

    protected $listeners = ['stockholdersUpdated' => '$refresh'];

    public function mount(Request $request)
    {
        $this->roundId = $request->session()->get('active_round');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = new User;
        if ($this->roundId) {
            $stockholders = $users->searchRoundStockholders($this->roundId, $this->search, $this->perPage);
        } else {
            $stockholders = $users->searchAllStockholders($this->search, $this->perPage);
        }

        return view('livewire.stockholders.table', compact('stockholders'));
    }
}
