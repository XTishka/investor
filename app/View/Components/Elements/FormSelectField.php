<?php

namespace App\View\Components\Elements;

use Illuminate\View\Component;

class FormSelectField extends Component
{
    public $id;
    public $name;
    public $label;
    public $rounds;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $name, $label, $rounds)
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->rounds = $rounds;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.elements.form-select-field');
    }
}
