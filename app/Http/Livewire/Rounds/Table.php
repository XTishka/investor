<?php

namespace App\Http\Livewire\Rounds;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Round;
use App\Services\WeeksService;
use Carbon\Carbon;

class Table extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $listeners = ['refreshTable' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $rounds = Round::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(10);

        foreach ($rounds as $round) {
            $round->wishes_start = Carbon::parse($round->start_wishes_date)->format('j F, Y');
            $round->wishes_stop = Carbon::parse($round->stop_wishes_date)->format('j F, Y');

            $round->start = Carbon::parse($round->start_date)->format('j F, Y');
            $round->stop = Carbon::parse($round->end_date)->format('j F, Y');

            $now = Carbon::now();
            $status = 'not setted';
            if ($now->lessThan($round->wished_start)) $status = 'waiting';
            if ($now->greaterThan($round->wishes_start) and $now->lessThan($round->wishes_stop)) $status = 'collecting wishes';
            if ($now->greaterThan($round->wishes_stop) and $now->lessThan($round->start)) $status = 'distribution period';
            if ($now->greaterThan($round->start) and $now->lessThan($round->stop)) $status = 'life as dream';
            if ($now->greaterThan($round->stop)) $status = 'finished';
            $round->status = $status;
        }

        return view('livewire.rounds.table', compact('rounds'));
    }
}
