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
        while ($weekNumber < $weeksQty) {
            $weekNumber++;

            // TODO: Create new and delete other
            // Retrieve flight by name or create it with the name, delayed, and arrival_time attributes...
            //            $flight = Flight::firstOrCreate(
            //                ['name' => 'London to Paris'],
            //                ['delayed' => 1, 'arrival_time' => '11:30']
            //            );

            $week = Week::firstOrCreate([
                'round_id' => $round_id,
                'year' => $date->year,
                'number' => $date->weekOfYear,
            ]);

//            $week = new Week();
//            $week->round_id = $round_id;
//            $week->year = $date->year;
//            $week->number = $date->weekOfYear;
//            $week->start_date = $date->startOfWeek()->format('Y-m-d');
//            $week->end_date = $date->endOfWeek()->format('Y-m-d');
//            $week->save();

            $date = $date->addWeek();
        }

        return $weeksQty;
    }
}
