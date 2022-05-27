<?php

namespace App\Actions;

use Barryvdh\Debugbar\Facades\Debugbar;
use Carbon\Carbon;
use Lorisleiva\Actions\Concerns\AsAction;

class GenerateRoundWeeksAction
{
    use AsAction;

    public function handle($round)
    {
        $startDate = Carbon::parse($round->start_round_date);
        $endDate = Carbon::parse($round->end_round_date);
        $weeksQty = intval(round($startDate->floatDiffInRealWeeks($endDate), 0, PHP_ROUND_HALF_UP));

        $counter = $weeksQty;
        while ($counter > 0) {
            Debugbar::log($counter--);
        }

        return $weeksQty;
    }
}
