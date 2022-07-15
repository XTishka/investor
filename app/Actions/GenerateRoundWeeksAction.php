<?php

namespace App\Actions;

use Barryvdh\Debugbar\Facades\Debugbar;
use Carbon\Carbon;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\Week;

class GenerateRoundWeeksAction
{
    use AsAction;

    public function handle($round_id, $request)
    {
        $startDate = Carbon::parse($request->start_round_date);
        $endDate = Carbon::parse($request->end_round_date);
        $weeksQty = intval(round($startDate->floatDiffInRealWeeks($endDate), 0, PHP_ROUND_HALF_UP));

        $weekNumber = 0;
        $date = $startDate;

        // Add new weeks
        while ($weekNumber < $weeksQty) {
            $weekNumber++;

            Week::firstOrCreate([
                'round_id' => $round_id,
                'year' => $date->year,
                'number' => $date->weekOfYear,
                'start_date' => $date->format('Y-m-d'),
                'end_date' => $date->addWeek()->addDay()->format('Y-m-d'),
            ]);

            // $date = $date->addWeek()->addDay();
        }

        // Remove after round end date weeks
        Week::where('start_date', '>', $endDate)->delete();

        return $weeksQty;
    }

}
