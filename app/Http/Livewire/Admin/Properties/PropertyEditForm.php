<?php

namespace App\Http\Livewire\Admin\Properties;

use Livewire\Component;
use App\Models\Property;
use Exception;

class PropertyEditForm extends Component
{
    public $property;
    public $name;
    public $country;
    public $address;
    public $description;
    public $flashAnchor = '';
    public $flashMessage = '';

    public function mount()
    {
        $this->name         = $this->property->name;
        $this->country      = $this->property->country;
        $this->address      = $this->property->address;
        $this->description  = $this->property->description;
    }

    public function rules()
    {
        return [
            'name'          => ['required', 'string', 'max:255'],
            'country'       => ['required', 'string', 'min:3'],
            'address'       => ['string', 'min:8'],
            'description'   => ['nullable', 'string', 'min:8'],
        ];
    }

    public function updateProperty()
    {
        $this->validate();

        try {
            $this->property->update([
                'name'          => $this->name,
                'country'       => $this->country,
                'address'       => $this->address,
                'description'   => $this->description,
            ]);
            $this->message      = true;
            $this->flashAnchor  = 'form_save__success';
            $this->flashMessage = 'Property details successfully updated';
        } catch (Exception $e) {
            $this->message      = true;
            $this->flashAnchor  = 'form_save__error';
            $this->flashMessage = 'Error! Data has not beed saved';
        }
        session()->flash($this->flashAnchor, __($this->flashMessage));
    }

    public function render()
    {
        return view('livewire.admin.properties.property-edit-form', [
            'flashAnchor' => $this->flashAnchor,
        ]);
    }
}
