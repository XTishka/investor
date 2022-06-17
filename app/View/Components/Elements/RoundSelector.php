<?php

namespace App\View\Components\Elements;

use Illuminate\View\Component;

class RoundSelector extends Component
{
    public $round;
    public $rounds;
    public $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($round, $rounds, $route)
    {
        $this->round = $round;
        $this->rounds = $rounds;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.elements.round-selector');
    }
}
