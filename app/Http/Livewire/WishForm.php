<?php

namespace App\Http\Livewire;

use App\Models\Property;
use Debugbar;
use Livewire\Component;
use App\Models\Priority;
use App\Models\Wish;

class WishForm extends Component
{
    public $userId;
    public $roundId;

    public function render()
    {
        Debugbar::info('UserID: ' . $this->userId);
        Debugbar::info('RoundID: ' . $this->roundId);
        Debugbar::info('Max available: ' . $this->maxProperties());
        Debugbar::info('Used properties qty: ' . $this->usedProperties()->count());

        return view('livewire.wish-form', [
            'countries' => $this->getCountries(),
        ]);
    }

    public function getCountries()
    {
        if ($this->maxProperties() >= $this->usedProperties()->count()) {
            return $this->usedProperties()
                ->join('properties', 'wishes.property_id', '=', 'properties.id')
                ->distinct('properties.country')
                ->get();
        }
        return Property::select('country')->distinct()->orderBy('country')->get();
    }

    public function maxProperties()
    {
        return Priority::query()
            ->where('user_id', $this->userId)
            ->where('round_id', $this->roundId)
            ->value('available_properties');
    }

    public function usedProperties()
    {
        return Wish::query()
            ->join('weeks', 'wishes.week_id', '=', 'weeks.id')
            ->where('wishes.user_id', $this->userId)
            ->where('weeks.round_id', $this->roundId)
            ->distinct();
    }
}
