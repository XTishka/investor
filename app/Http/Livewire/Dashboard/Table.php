<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Round;
use App\Repositories\RoundRepository;
use App\Services\WeeksService;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $roundId;
    public $perPage = 10;

    protected $listeners = ['refreshTable' => '$refresh'];

    public function mount(Request $request)
    {
        $this->roundId = $request->session()->get('active_round');

        if ($this->roundId == null) {
            $repository = new RoundRepository;
            $round = $repository->getLastEndedRound();
            $this->roundId = $round->id;
        }
    }

    public function render()
    {
        $round = Round::query()->find($this->roundId);
        $service = new WeeksService;
        $weeks = $service->roundWeeks($round->start_date, $round->end_date);

        $stockholders = $round->users()->orderBy('priority')->paginate($this->perPage);
        $wishes = DB::table('wishes')
            ->join('round_user', 'wishes.user_id', '=', 'round_user.user_id')
            ->join('users', 'round_user.user_id', '=', 'users.id')
            ->join('properties', 'wishes.property_id', '=', 'properties.id')
            ->select(
                'wishes.id as id',
                'wishes.status as status',
                'wishes.week_code as week_code',
                'wishes.user_id as user_id',
                'round_user.priority as user_priority',
                'users.name as user_name',
                'wishes.property_id as property_id',
                'properties.name as property_name'
            )
            ->where('wishes.round_id', $this->roundId)
            ->orderBy('round_user.priority')
            ->get();

        foreach ($stockholders as $stockholder) {
            $stockholder->weeks = $weeks;
        }

        return view('livewire.dashboard.table', compact('weeks', 'stockholders', 'wishes'));
    }
}
