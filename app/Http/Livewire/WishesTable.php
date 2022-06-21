<?php

namespace App\Http\Livewire;

use App\Http\Traits\ActiveRoundTrait;
use App\Models\Wish;
use Livewire\Component;
use App\Models\Priority;
use Illuminate\Http\Request;
use App\Models\Round;

class WishesTable extends Component
{
    use ActiveRoundTrait;

    public $search = '';

    public function render(Request $request)
    {
        $rounds = Round::all();
        $roundId = ($request->round_id) ? $request->round_id : $this->activeRound()->id;
        $round = $rounds->where('id', $roundId)->first();
        $priorities = Priority::where('round_id', $roundId)->get();

        $wishes = Wish::query()
            ->join('weeks', 'wishes.week_id', '=', 'weeks.id')
            ->join('properties', 'wishes.property_id', '=', 'properties.id')
            ->join('users', 'wishes.user_id', '=', 'users.id')
            ->select(
                'wishes.id as id',
                'wishes.status as status',
                'weeks.number as week_number',
                'weeks.start_date as week_start_date',
                'weeks.end_date as week_end_date',
                'properties.name as property_name',
                'properties.country as property_country',
                'users.id as stockholder_id',
                'users.name as stockholder_name',
            )
            ->where('weeks.round_id', $roundId)
            // ->orWhere('weeks.number', 'like', '%' . $this->search . '%')
            // ->orWhere('users.name', 'like', '%' . $this->search . '%')
            // ->orWhere('properties.country', 'like', '%' . $this->search . '%')
            // ->orWhere('properties.name', 'like', '%' . $this->search . '%')
            // ->orWhere('wishes.status', 'like', '%' . $this->search . '%')
            ->orWhere('weeks.round_id', 'like', $roundId)
            ->get();
        $priorities = Priority::where('round_id', $roundId)->get();
        return view('livewire.wishes-table', compact('wishes', 'round', 'rounds', 'priorities'));
    }
}
