<?php

namespace App\View\Components;

use App\Models\Round;
use Illuminate\View\Component;

class AppLayout extends Component
{
    public $currentRound;
    public $futureRounds;
    public $passedRounds;

    public function __construct()
    {
        // $round = new Round();
        // $this->currentRound = $round->current();
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app', [
            // 'currentRound' => $this->currentRound,
        ]);
    }
}
