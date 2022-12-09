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
    public $importModal = false;
    public $confirmingItemAdd = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function openTest()
    {
        $this->confirmingItemAdd = true;
    }

    public function openImportModal()
    {
        debugbar()->info('import property');
        $this->importModal = true;
    }

    public function close()
    {
        debugbar()->info('close modal');
        $this->importModal = false;
    }

    public function render()
    {
        $properties = Property::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('country', 'like', '%' . $this->search . '%')
            ->orWhere('address', 'like', '%' . $this->search . '%')
            ->orderBy('name')
            ->paginate(10);

        return view('livewire.admin.properties.properties-index-table', compact('properties'));
    }
}
