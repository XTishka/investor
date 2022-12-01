<?php

namespace App\Http\Livewire\Admin\Properties;

use App\Models\Property;
use Livewire\Component;

class PropertyRegistrationForm extends Component
{
    public $name;
    public $country;
    public $address;
    public $description;

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'min:3'],
            'address' => ['string', 'min:8'],
            'description' => ['nullable', 'string', 'min:8'],
        ];
    }

    public function storeProperty()
    {
        $this->validate();

        Property::query()
            ->create([
                'name' => $this->name,
                'country' => $this->country,
                'address' => $this->address,
                'description' => $this->description,
            ]);

        return redirect()->route('admin.properties');
    }

    public function render()
    {
        return view('livewire.admin.properties.property-registration-form');
    }
}
