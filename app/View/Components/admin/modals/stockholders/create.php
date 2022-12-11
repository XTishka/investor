<?php

namespace App\View\Components\admin\modals\stockholders;

use Illuminate\View\Component;
use App\Models\Round;

class create extends Component
{
    public $groupedRounds;
    public $test;

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
        $this->test = 'hello world';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.modals.stockholders.create');
    }
}
