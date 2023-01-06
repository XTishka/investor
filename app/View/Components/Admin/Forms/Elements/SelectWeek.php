<?php

namespace App\View\Components\Admin\Forms\Elements;

use App\Models\Round;
use App\Services\WeeksService;
use Illuminate\View\Component;

class SelectWeek extends Component
{
    public $weeks = [];
    public $round;
    public $stockholder;

    public function __construct($round, $property, $stockholder)
    {
        $round = Round::find($round);
        $service = new WeeksService;
        $this->weeks = $service->roundPropertyAvailableWeeks($round->start_date, $round->end_date, $round->id, $property, $stockholder);
    }

    public function render()
    {
        return view('components.admin.forms.elements.select-week');
    }
}
