<?php

namespace App\Http\Livewire;

use Debugbar;
use Livewire\Component;
use App\Models\Week;
use App\Models\PropertyAvailability;

class Switcher extends Component
{
    public $week;
    public $propertyId;

    public function render()
    {
        return view('livewire.switcher');
    }

    public function switchWeek(Week $weeks) {
        Debugbar::info('switcher was clicked...');

        $checkWishes = $weeks->hasWishes($this->week->id, $this->propertyId);
        if ($checkWishes == true) return back();

        $availability = PropertyAvailability::where('week_id', $this->week->id)->where('property_id', $this->propertyId)->first();
        if (!$availability) {
            PropertyAvailability::firstOrCreate([
                'week_id' => $this->week->id,
                'property_id' => $this->propertyId
            ]);
        } else {
            PropertyAvailability::where('week_id', $this->week->id)->where('property_id', $this->propertyId)->delete();
        }

        
    }
}
