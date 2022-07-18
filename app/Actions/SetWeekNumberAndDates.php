<?php

namespace App\Actions;

use App\Models\Round;
use App\Models\Week;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Carbon;

class SetWeekNumberAndDates
{
    use AsAction;

    public function handle()
    {
        $round = Round::find(2);
        $weeks = Week::whereRoundId($round->id)->get();

        $startDate = Carbon::parse('2022-10-22');

        foreach ($weeks as $week) {

            $week->year = $startDate->year;
            $week->start_date = $startDate->format('Y-m-d');
            $week->end_date = $startDate->addWeek()->format('Y-m-d');
            $week->number = $startDate->weekOfYear;
            $week->save();
        }
    }
}