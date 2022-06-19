<?php

namespace App\View\Components\Elements;

use Illuminate\View\Component;

class FormInputField extends Component
{
    public $id;
    public $type;
    public $name;
    public $label;
    public $placeholder;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $type, $name, $label, $placeholder, $value)
    {
        $this->id = $id;
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.elements.form-input-field');
    }
}
