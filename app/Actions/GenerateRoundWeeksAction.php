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
        $date = Carbon::parse("2022-05-27");

        $weekInfo['weekQty'] = $date->weekNumberInMonth;
        $weekInfo['weekNumber'] = $date->weekOfYear;
        $weekInfo['start'] = $date->startOfWeek()->toDateString();
        $weekInfo['end'] = $date->endOfWeek()->toDateString();

        Debugbar::info('test');

        return $weekInfo;
    }
}
