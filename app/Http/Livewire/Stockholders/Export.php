<?php

namespace App\Http\Livewire\Stockholders;

use Livewire\Component;
use App\Services\RoundServices;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StockholdersAllExport;
use App\Exports\StockholderRoundExport;
use App\Models\Round;

class Export extends Component
{
    public $modal = false;
    public $export = 'all';
    public $roundId;
    public $groupedRounds;

    public function openModal()
    {
        $this->modal = true;
        $service = new RoundServices;
        $this->groupedRounds = $service->getGroupedRounds();
    }

    public function closeModal()
    {
        $this->reset(['export']);
        $this->modal = false;
    }

    public function export()
    {
        if ($this->export == 'all') {
            $this->validate(['export' => 'required']);
            $this->closeModal();
            return Excel::download(new StockholdersAllExport, 'stockholders_' . now()->timestamp . '.csv');
        };

        if ($this->export == 'round') {
            $this->validate(['export' => 'required', 'roundId' => 'required|numeric']);
            $round = Round::query()->find($this->roundId);
            $filename = 'stockholders_' . $round->name . '_' . now()->timestamp . '.csv';
            $file = Excel::download(new StockholderRoundExport($this->roundId), $filename);
            $this->closeModal();
            return $file;
        };

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.stockholders.export');
    }
}
