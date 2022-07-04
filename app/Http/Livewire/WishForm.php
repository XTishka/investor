<?php

namespace App\Http\Livewire;

use App\Models\Property;
use Debugbar;
use Livewire\Component;
use App\Models\Priority;
use App\Models\PropertyAvailability;
use App\Models\Wish;
use App\Models\Week;

class WishForm extends Component
{
    public $userId;
    public $roundId;
    public $selectedCountry = null;
    public $selectedProperty = null;

    public function render()
    {
        return view('livewire.wish-form', [
            'countries' => Property::select('country')->distinct()->orderBy('country')->get(),
            'properties' => Property::where('country', $this->selectedCountry)->get(),
            'weeks' => Week::where('round_id', $this->roundId)->get(),
            'not_available' => PropertyAvailability::all(),
            'used_weeks' => Wish::all(),
        ]);
    }
}
