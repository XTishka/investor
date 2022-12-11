<?php

namespace App\Http\Livewire\Admin\Properties;

use App\Models\Property;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PropertiesImport;

class PropertiesIndexTable extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $file;
    public $importModalForm = false;

    public function rules()
    {
        return [
            'file' => 'required|mimes:csv|max:2048',
        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function importModal()
    {
        $this->importModalForm = true;
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

    public function importProperties() {
        $this->validate();
        Excel::import(new PropertiesImport(), $this->file->store('temp'));
        return redirect()->route('admin.properties');
        $this->importModalForm = false;
    }
}
