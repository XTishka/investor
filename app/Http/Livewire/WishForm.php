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
        Debugbar::info('UserID: ' . $this->userId);
        Debugbar::info('RoundID: ' . $this->roundId);
        Debugbar::info('Max available: ' . $this->maxProperties());
        Debugbar::info('Used properties qty: ' . $this->usedProperties()->count());
        Debugbar::info('Selected country: ' . $this->selectedCountry);
        Debugbar::info('Selected property: ' . $this->selectedProperty);

        return view('livewire.wish-form', [
            'countries' => $this->getCountries(),
            'properties' => $this->getProperties(),
            'weeks' => $this->getWeeks(),
            'not_available' => PropertyAvailability::all(),
            'used_weeks' => Wish::all(),
        ]);
    }

    public function getCountries()
    {
        if ($this->maxProperties() <= $this->usedProperties()->count()) {
            return $this->usedProperties()
                ->join('properties', 'wishes.property_id', '=', 'properties.id')
                ->groupBy('properties.country')
                ->get();
        }
        return Property::select('country')->distinct()->orderBy('country')->get();
    }

    public function getProperties()
    {
        if ($this->maxProperties() <= $this->usedProperties()->count()) {
            return $this->usedProperties()
                ->join('properties', 'wishes.property_id', '=', 'properties.id')
                ->groupBy('properties.name')
                ->get();
        }
        return Property::query()
            ->select(['id', 'name'])
            ->where('country', $this->selectedCountry)
            ->get();
    }

    public function getWeeks()
    {
        return Week::query()
            ->leftJoin('wishes', 'weeks.id', '=', 'wishes.week_id')
            ->select([
                'weeks.id as id',
                'weeks.number as number',
                'weeks.round_id as round_id',
                'weeks.start_date as start_date',
                'weeks.end_date as end_date',
                'wishes.property_id as property_id',
                'wishes.week_id as week_id',
            ])
            ->where('weeks.round_id', $this->roundId)
            ->get();
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

    public function notAvailableProperty()
    {
        $properties = PropertyAvailability::all();
        $keyed = $properties->mapWithKeys(function ($item, $key) {
            return [$item['week_id'] => $item['property_id']];
        });
        return $keyed->all();
    }
}
