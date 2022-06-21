<?php

namespace App\View\Components\Elements;

use Illuminate\View\Component;

class TableActionButtons extends Component
{
    public $id;
    public $showRoute;
    public $editRoute;
    public $deleteRoute;
    public $round;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $route, $round = false)
    {
        $this->id = $id;
        $this->showRoute = $route  . '.show';
        $this->editRoute = $route . '.edit';
        $this->deleteRoute = $route . '.delete';
        $this->round = ($round == false) ? '' : $round;
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
