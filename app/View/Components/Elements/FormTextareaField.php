<?php

namespace App\View\Components\Elements;

use Illuminate\View\Component;

class FormTextareaField extends Component
{
    public $id;
    public $name;
    public $label;
    public $placeholder;
    public $value;
    public $rows;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $name, $label, $placeholder, $value, $rows)
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.elements.form-textarea-field');
    }
}
