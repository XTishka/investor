<?php

namespace App\Http\Livewire\Admin\Properties;

use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PropertiesIndexTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $properties = Property::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('country', 'like', '%' . $this->search . '%')
            ->orWhere('address', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.admin.properties.properties-index-table', compact('properties'));
    }
}
