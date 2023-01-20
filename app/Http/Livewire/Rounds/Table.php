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
        }

        return view('livewire.rounds.table', compact('rounds'));
    }
}
