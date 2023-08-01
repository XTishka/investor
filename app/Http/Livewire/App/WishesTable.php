<?php

namespace App\Http\Livewire\App;

use App\Models\Wish;
use App\Services\RoundServices;
use App\Services\WeeksService;
use Livewire\Component;
use Carbon\Carbon;

class WishesTable extends Component
{
    public $stockholder;

    protected $listeners = ['updateTable' => '$refresh'];

    public function updatePriority($list)
    {
        foreach ($list as $item) {
            $wish = Wish::query()->find($item['value']);
            $wish->update(['priority' => $item['order']]);
        }
    }

    public function render(RoundServices $roundService)
    {
        $round = $roundService->getActiveRound();
        $wishes = Wish::query()
            ->where('round_id', $round->id)
            ->where('user_id', $this->stockholder->id)
            ->orderBy('priority')
            ->get();

        foreach ($wishes as $wish) {
            $service = new WeeksService;
            $weekDates = $service->getWeekDatesFromCode($wish->week_code);

            $wish->week_start_date = $weekDates['start']->format('j F, Y');
            $wish->week_end_date = $weekDates['end']->format('j F, Y');
        }

        return view('livewire.app.wishes-table', [
            'wishes' => $wishes,
            'round' => $round,
        ]);
    }
}