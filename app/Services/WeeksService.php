<?php

namespace App\Services;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;
use App\Models\Week;

class WeeksService
{
    public function count($start_date, $end_date)
    {
        $weeksQty = ceil(Carbon::parse($start_date)->floatDiffInWeeks($end_date));
        return $weeksQty;
    }

    public function roundWeeks($start_date, $end_date)
    {
        $roundWeeksArray    = [];
        $weeksQty           = $this->count($start_date, $end_date);
        $roundStartDate     = Carbon::parse($start_date);
        $roundStartWeek     = $roundStartDate->weekOfYear;

        $weekStartDate  = Carbon::parse($start_date);
        $weekEndDate    = Carbon::parse($start_date)->addDays(7);
        for (
            $week = $roundStartWeek;
            $week <= $roundStartWeek + $weeksQty;
            $week++
        ) {
            $roundWeeksArray = Arr::add($roundWeeksArray, $week, [
                'week_start'    => [
                    'number'        => $weekStartDate->weekOfYear,
                    'date'          => $weekStartDate->format('Y-m-d'),
                    'human_date'    => $weekStartDate->format('j F, Y'),
                    'status'        => $weekStartDate->isPast(),
                    'day'           => $weekStartDate->englishDayOfWeek,
                ],
                'week_end'      => [
                    'number'        => $weekEndDate->weekOfYear,
                    'date'          => $weekEndDate->format('Y-m-d'),
                    'human_date'    => $weekEndDate->format('j F, Y'),
                    'status'        => $weekEndDate->isFuture(),
                    'day'           => $weekStartDate->englishDayOfWeek,
                ],
                'code' => $weekStartDate->year . $weekStartDate->weekOfYear,
            ]);

            $weekStartDate->addDays(7);
            $weekEndDate->addDays(7);
        }

        return $roundWeeksArray;
    }

    public function roundWeeksWithStatus($start_date, $end_date, $roundId, $propertyId)
    {
        $weeks = $this->roundWeeks($start_date, $end_date);
        foreach ($weeks as $key => $week) {
            $status = Week::query()
                ->where('code', $week['code'])
                ->where('round_id', $roundId)
                ->where('property_id', $propertyId)
                ->exists();

            $weeks[$key]['available'] = $status;
        }
        return $weeks;
    }
}
