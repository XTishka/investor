<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StockholderWishesTable extends Component
{
    public $search = '';
    public $stockholder;

    public function render(User $stockholder)
    {
        $src = '%' . $this->search . '%';
        $wishes = DB::table('wishes')
            ->join('weeks', 'wishes.week_id', '=', 'weeks.id')
            ->join('properties', 'wishes.property_id', '=', 'properties.id')
            ->join('rounds', 'weeks.round_id', '=', 'rounds.id')
            ->select(
                'wishes.id as id',
                'wishes.status as status',
                'rounds.id as round_id',
                'rounds.name as round_name',
                'weeks.number as week_number',
                'weeks.start_date as week_start_date',
                'weeks.end_date as week_end_date',
                'properties.name as property_name',
                'properties.country as property_country',
            )
            ->where('wishes.user_id', $this->stockholder->id)
            ->where(
                function ($query) use ($src) {
                    return $query
                    ->orWhere('rounds.name', 'like', $src)
                    ->orWhere('weeks.number', 'like', $src)
                    ->orWhere('properties.country', 'like', $src)
                    ->orWhere('properties.name', 'like', $src);
                })
            ->get();
        return view('livewire.stockholder-wishes-table', compact('stockholder', 'wishes'));
    }
}
