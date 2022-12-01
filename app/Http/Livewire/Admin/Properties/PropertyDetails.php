<?php

namespace App\Http\Livewire\Admin\Properties;

use Livewire\Component;

class PropertyDetails extends Component
{
    public $property;

    public function render()
    {
        return view('livewire.admin.properties.property-details');
    }
}
