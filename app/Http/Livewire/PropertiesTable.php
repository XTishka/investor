<?php

namespace App\Http\Livewire;

use App\Http\Traits\ActiveRoundTrait;
use App\Models\Property;
use Livewire\Component;
use Illuminate\Support\Facades\Request;

class PropertiesTable extends Component
{
    use ActiveRoundTrait;

    public $search = '';

    public function render()
    {
        $properties = Property::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('country', 'like', '%' . $this->search . '%')
            ->orWhere('Address', 'like', '%' . $this->search . '%')
            ->get();
        return view('livewire.properties-table', compact('properties'));
    }
}
