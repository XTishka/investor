<?php

namespace App\Http\Livewire\Dashboard;

use App\Exports\RoundInfoExport;
use App\Models\Round;
use App\Models\Wish;
use Livewire\Component;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Info extends Component
{
    public $modal = false;
    public $roundId;

    public function mount(Request $request)
    {
        $this->roundId = $request->session()->get('active_round');
    }

    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function export()
    {
        return Excel::download(new RoundInfoExport($this->getStockholders()), $this->getFilename());
    }

    public function render()
    {
        return view('livewire.dashboard.info', [
            'stockholders' => $this->getStockholders(),
        ]);
    }

    public function getStockholders()
    {
        $round = Round::query()->find($this->roundId);
        $stockholders = $round->users()->get();
        foreach ($stockholders as $stockholder) :
            $stockholder->wishes = Wish::query()
                ->where('round_id', $round->id)
                ->where('user_id', $stockholder->id)
                ->count();
        endforeach;
        return $stockholders->sortByDesc('wishes');
    }

    public function getFilename()
    {
        $round = Round::query()->find($this->roundId);
        return 'round_info_' . $round->name . '_' . now()->timestamp . '.csv';
    }
}
