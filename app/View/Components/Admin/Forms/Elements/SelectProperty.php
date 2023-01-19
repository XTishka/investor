<?php

namespace App\View\Components\Admin\Forms\Elements;

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
    public function __construct(Property $properties)
    {
        $this->properties = $properties->all()->sortBy('name');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.forms.elements.select-property');
    }
}
