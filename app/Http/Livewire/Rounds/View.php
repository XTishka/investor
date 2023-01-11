<?php

namespace App\Http\Livewire\Rounds;

use Livewire\Component;
use Carbon\Carbon;
use App\Services\WeeksService;
use App\Models\Round;

class View extends Component
{
    public $modal = false;
    public $weeks;
    public $roundName;
    public $roundDescription;
    public $roundWeeks = [];
    public $roundStopWishesDate;
    public $roundStartDate;
    public $roundEndDate;

    protected $listeners = ['openViewModal' => 'openModal'];

    public function openModal(Round $round)
    {
        $service = new WeeksService;
        $this->roundName           = $round->name;
        $this->roundDescription    = $round->description;
        $this->roundWeeks          = $service->roundWeeks($round->start_date, $round->end_date);
        $this->roundStopWishesDate = Carbon::parse($round->stop_wishes_date)->format('j F, Y');
        $this->roundStartDate      = Carbon::parse($round->start_date)->format('j F, Y');
        $this->roundEndDate        = Carbon::parse($round->end_date)->format('j F, Y');
        $this->modal = true;
        debugbar()->info($this->roundWeeks);
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function render()
    {
        return view('livewire.rounds.view');
    }
}
