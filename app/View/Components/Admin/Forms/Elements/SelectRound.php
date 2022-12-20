<?php

namespace App\View\Components\Admin\Forms\Elements;

use Illuminate\View\Component;
use App\Services\RoundServices;

class SelectRound extends Component
{
    public $groupedRounds = [];

    public function __construct(RoundServices $service)
    {
        $this->groupedRounds = $service->getGroupedRounds();
    }

    public function render()
    {
        return view('components.admin.forms.elements.select-round');
    }
}
