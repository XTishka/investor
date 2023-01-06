<?php

namespace App\View\Components\Front\Form;

use App\Models\Property;
use Illuminate\View\Component;

class SelectProperty extends Component
{
    public $properties;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->properties = Property::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.form.select-property');
    }
}
