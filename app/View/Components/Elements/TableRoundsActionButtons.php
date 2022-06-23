<?php

namespace App\View\Components\Elements;

use App\Models\Round;
use Debugbar;
use Illuminate\View\Component;
use Illuminate\Support\Carbon;
use App\Models\Week;

class TableRoundsActionButtons extends Component
{
    public $id;
    public $editable = true;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;

        $hasWishes = Week::query()
            ->join('wishes', 'weeks.id', '=' ,'wishes.week_id')
            ->where('weeks.round_id', $id)
            ->count();
        if ($hasWishes > 0) $this->editable = false;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.elements.table-rounds-action-buttons');
    }
}
