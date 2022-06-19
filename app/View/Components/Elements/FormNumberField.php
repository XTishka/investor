<?php

namespace App\View\Components\Elements;

use Illuminate\View\Component;

class FormNumberField extends Component
{
    public $id;
    public $name;
    public $label;
    public $placeholder;
    public $min;
    public $max;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $name, $label, $placeholder, $value, $min, $max)
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.elements.form-number-field');
    }
}
