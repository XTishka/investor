<?php

namespace App\View\Components\Admin\Modals\Stockholders;

use Illuminate\View\Component;
use App\Models\Round;

class ImportStockholders extends Component
{
    public $groupedRounds;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->groupedRounds = [
            'running' => Round::running()->toArray(),
            'future' => Round::future()->toArray(),
            'passed' => Round::passed()->toArray(),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.modals.stockholders.import-stockholders');
    }
}
