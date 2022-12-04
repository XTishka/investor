<?php

namespace App\Http\Livewire\Admin\Properties;

use App\Models\Property;
use App\Models\Week;
use App\Services\WeeksService;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Models\Round;
use Carbon\Carbon;

class PropertyDetails extends Component
{
    public $weekCode;
    public $roundId;
    public $property;
    public $propertyId;
    public $roundWeeks = [];

    public function __construct()
    {
        $this->roundId = Session::get('active_round');
    }

    public function mount(Property $property, WeeksService $weeksService)
    {
        $this->property = $property;

        if ($this->roundId) {
            $round = Round::query()->find($this->roundId);
            $this->roundWeeks = $weeksService->roundWeeksWithStatus($round->start_date, $round->end_date, $round->id, $property->id);
        }
    }

    public function render()
    {
        Debugbar::info($this->roundWeeks);

        return view('livewire.admin.properties.property-details', [
            'roundWeeks' => $this->roundWeeks,
        ]);
    }

    public function enable($weekCode)
    {
        Week::query()
            ->where('code', $weekCode)
            ->where('property_id', $this->property->id)
            ->where('round_id', $this->roundId)
            ->delete();
    }

    public function disable($weekCode)
    {
        Week::query()->firstOrCreate([
            'code'          => $weekCode,
            'property_id'   => $this->property->id,
            'round_id'      => $this->roundId,
        ]);
    }
}
