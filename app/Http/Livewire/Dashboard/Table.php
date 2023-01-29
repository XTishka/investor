<?php

namespace App\Http\Livewire\Dashboard;

use App\Http\Traits\ActiveRoundTrait;
use App\Models\Property;
use App\Models\Round;
use App\Models\Wish;
use App\Repositories\RoundRepository;
use App\Services\WeeksService;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination, ActiveRoundTrait;

    public $perPage = 10;

    protected $listeners = ['refreshTable' => '$refresh'];

    public function render(Request $request)
    {
        $round        = $this->activeRound($request);
        $service      = new WeeksService;
        $weeks        = $service->roundWeeks($round->start_date, $round->end_date);
        $stockholders = $round->users()->orderBy('priority')->paginate($this->perPage);
        $wishes       = Wish::query()->where('round_id', $round->id)->get();
        $properties   = Property::all();

        foreach ($stockholders as $stockholder) :
            $stWeeks = $weeks;
            foreach ($stWeeks as $key => $week) :
                foreach ($wishes->where('user_id', $stockholder->id)->where('week_code', $week['code']) as $wish) :
                    $property = $properties->where('id', $wish->property_id)->first();
                    $stWeeks[$key]['wishes'][] = [
                        'property_id'   => $wish->property_id,
                        'property_name' => $property->name,
                        'status'        => $wish->status,
                    ];
                endforeach;
            endforeach;
            $stockholder->weeks = $stWeeks;
        endforeach;

        return view('livewire.dashboard.table', compact('weeks', 'stockholders', 'wishes'));
    }
}
