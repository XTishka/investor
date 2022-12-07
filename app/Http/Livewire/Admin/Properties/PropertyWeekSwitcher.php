<?php

namespace App\Http\Livewire\Admin\Properties;

use Livewire\Component;
use App\Models\Week;

class PropertyWeekSwitcher extends Component
{
    public $week;
    public $roundId;
    public $property;
    public $status;

    public function switcher($weekCode, $status = null) {
        if ($status) $this->enable($weekCode);
        if (!$status) $this->disable($weekCode);
    }

    public function enable($weekCode)
    {
        debugbar()->info('enable: ' . $weekCode);
        Week::query()
            ->where('code', $weekCode)
            ->where('property_id', $this->property->id)
            ->where('round_id', $this->roundId)
            ->delete();
        $this->status = false;
    }

    public function disable($weekCode)
    {
        Week::query()->firstOrCreate([
            'code'          => $weekCode,
            'property_id'   => $this->property->id,
            'round_id'      => $this->roundId,
        ]);
        $this->status = true;
    }

    public function render()
    {
        debugbar()->info($this->week);
        $this->status = Week::query()
            ->where('code', $this->week['code'])
            ->where('property_id', $this->property->id)
            ->where('round_id', $this->roundId)
            ->exists();
        return view('livewire.admin.properties.property-week-switcher');
    }
}
