<?php

namespace App\Http\Livewire;

use App\Http\Traits\ActiveRoundTrait;
use App\Models\Property;
use App\Models\Round;
use App\Models\Wish;
use Livewire\Component;

class StockholderWishes extends Component
{
    use ActiveRoundTrait;

    public $usedWishes;

    public function render()
    {
        $weeks = Round::find($this->activeRound()->id)->weeks;
        $properties = Property::all();
        $wishes = Wish::query()
            ->whereBelongsTo($weeks)
            ->whereBelongsTo($properties)
            ->where('user_id', auth()->user()->id)
            ->get()
            ->sortBy('priority');

        return view('livewire.stockholder-wishes', compact('wishes'));
    }

    public function updatePriority($list)
    {
        foreach ($list as $item) {
            Wish::find($item['value'])->update(['priority' => $item['order']]);
        }
    }
}
