<?php

namespace App\View\Components\Elements;

use Illuminate\View\Component;

class FormCard extends Component
{
    public $title;
    public $form;
    public $submitButtonStyle;
    public $submitButtonText;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $form, $submitButtonStyle, $submitButtonText)
    {
        $this->title = $title;
        $this->form = $form;
        $this->submitButtonStyle = $submitButtonStyle;
        $this->submitButtonText = $submitButtonText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.elements.form-card');
    }
}
