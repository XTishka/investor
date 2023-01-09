<?php

namespace App\Http\Livewire\Stockholders;

use App\Models\Round;
use Livewire\Component;
use Illuminate\Http\Request;

class Sort extends Component
{
    public $modal = false;
    public $stockholders;
    public $roundId;

    public function mount(Request $request)
    {
        $this->roundId = $request->session()->get('active_round');
    }

    public function openModal()
    {
        $this->modal = true;
    }

    public function updatePriority($list)
    {
        $round = Round::query()->find($this->roundId);
        foreach ($list as $item) {
            $round->users()->updateExistingPivot($item['value'], [
                'priority' => $item['order'],
            ]);
        }
    }

    public function render()
    {
        if ($this->roundId) {
            $round = Round::query()->find($this->roundId);
            $this->stockholders = $round->users()->where('is_admin', 0)->orderBy('priority')->get();
        }
        return view('livewire.stockholders.sort');
    }
}
