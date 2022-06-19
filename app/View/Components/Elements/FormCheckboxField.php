<?php

namespace App\View\Components\Elements;

use Illuminate\View\Component;

class FormCheckboxField extends Component
{
    public $id;
    public $name;
    public $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $name, $label)
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.elements.form-checkbox-field');
    }
}
