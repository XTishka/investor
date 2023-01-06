<?php

namespace App\Http\Livewire\App;

use App\Services\WeeksService;
use Livewire\Component;
use Carbon\Carbon;

class WishesTable extends Component
{
    public object $round;
    public object $stockholder;

    protected $listeners = ['updateTable' => '$refresh'];

    public function render()
    {
        foreach ($this->stockholder->wishes as $wish) {
            $service = new WeeksService;
            $weekDates = $service->getWeekDatesFromCode($wish->week_code);

            $wish->week_start_date = $weekDates['start']->format('j F, Y');
            $wish->week_end_date = $weekDates['end']->format('j F, Y');
        }

        return view('livewire.app.wishes-table', [
            'wishes' => $this->stockholder->wishes,
        ]);
    }
}
