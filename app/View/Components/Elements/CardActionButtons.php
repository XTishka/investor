<?php

namespace App\View\Components\Elements;

use Illuminate\View\Component;

class CardActionButtons extends Component
{
    public array $buttons;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $buttons)
    {
        $this->buttons = $buttons;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.elements.card-action-buttons');
    }
}
