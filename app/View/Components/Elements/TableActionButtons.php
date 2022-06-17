<?php

namespace App\View\Components\Elements;

use Illuminate\View\Component;

class TableActionButtons extends Component
{
    public $stockholderId;
    public $route;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($stockholderId, $route)
    {
        $this->stockholderId = $stockholderId;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.elements.table-action-buttons');
    }
}
