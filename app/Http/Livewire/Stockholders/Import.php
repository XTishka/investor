<?php

namespace App\Http\Livewire\Stockholders;

use App\Actions\Stockholders\ImportAllStockholders;
use App\Actions\Stockholders\ImportFromFile;
use Livewire\Component;
use App\Services\RoundServices;
use Livewire\WithFileUploads;
use App\Actions\Stockholders\ImportFromRound;

class Import extends Component
{
    use WithFileUploads;

    public $modal = false;
    public $importToRound;
    public $importResource = 'round';
    public $groupedRounds;
    public $importFromRound;
    public $importFromFile = [
        'clean_round' => false,
        'update_name' => false,
    ];

    public function mount()
    {
        $service = new RoundServices;
        $this->groupedRounds = $service->getGroupedRounds();
    }

    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->reset(['importToRound', 'importFromRound', 'importFromFile']);
        $this->modal = false;
    }

    public function import()
    {
        if ($this->importResource == 'round') {
            $this->validate(['importFromRound' => 'required|numeric', 'importToRound' => 'required|numeric']);
            $action = new ImportFromRound;
            $action->handle($this->importFromRound, $this->importToRound);
        }

        if ($this->importResource == 'all') {
            $this->validate(['importToRound' => 'required|numeric']);
            $action = new ImportAllStockholders;
            $action->handle($this->importToRound);
        }

        if ($this->importResource == 'file') {
            $this->validate(['importToRound' => 'required|numeric', 'importFromFile.resource' => 'required|mimes:csv|max:2048']);
            $action = new ImportFromFile;
            $action->handle($this->importToRound, $this->importFromFile);
        }

        $this->emit('stockholdersUpdated');
        $this->closeModal();
        $this->emit('importReady');
    }

    public function render()
    {
        return view('livewire.stockholders.import');
    }
}
