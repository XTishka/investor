<?php

namespace App\Http\Livewire\Admin\Stockholders;

use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;

class Index extends Component
{
    public $search = '';
    public $roundId;
    public $perPage = 20;

    public function mount(Request $request)
    {
        $this->roundId = $request->session()->get('active_round');
    }

    public function render()
    {
        $users = new User;
        if ($this->roundId) {
            $stockholders = $users->searchRoundStockholders($this->roundId, $this->search, $this->perPage);
        } else {
            $stockholders = $users->searchAllStockholders($this->search, $this->perPage);
        }

        return view('livewire.admin.stockholders.index', compact('stockholders'));
    }
}
