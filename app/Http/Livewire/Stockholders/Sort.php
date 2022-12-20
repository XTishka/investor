<?php

namespace App\Http\Livewire\Stockholders;

use App\Models\Round;
use App\Models\User;
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
        debugbar()->info('update priority action');
        $round = Round::query()->find($this->roundId);
        foreach ($list as $item) {
            // Wish::find($item['value'])->update(['priority' => $item['order']]);
            $round->users()->updateExistingPivot($item['value'], [
                'priority' => $item['order'],
            ]);
            debugbar()->info($item);
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
