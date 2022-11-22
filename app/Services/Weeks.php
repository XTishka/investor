<?php

namespace App\Services;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;

class Weeks
{
    public function count($start_date, $end_date)
    {
        $weeksQty = ceil(Carbon::parse($start_date)->floatDiffInWeeks($end_date));
        return $weeksQty;
    }

    public function roundArray($start_date, $end_date)
    {
        $roundWeeksArray = [];
        $weeksQty = $this->count($start_date, $end_date);
        $roundStartDate = Carbon::parse($start_date);
        $roundStartWeek = $roundStartDate->weekOfYear;

        $weekStartDate = Carbon::parse($start_date);
        $weekEndDate = Carbon::parse($start_date)->addDays(7);
        for (
            $week = $roundStartWeek;
            $week <= $roundStartWeek + $weeksQty;
            $week++
        ) {
            $roundWeeksArray = Arr::add($roundWeeksArray, $week, [
                'week_start' => [
                    'number' => $weekStartDate->weekOfYear,
                    'date' => $weekStartDate->format('Y-m-d'),
                    'human_date' => $weekStartDate->format('j F, Y'),
                    'status' => $weekStartDate->isPast(),
                    'day' => $weekStartDate->englishDayOfWeek,
                ],
                'week_end' => [
                    'number' => $weekEndDate->weekOfYear,
                    'date' => $weekEndDate->format('Y-m-d'),
                    'human_date' => $weekEndDate->format('j F, Y'),
                    'status' => $weekEndDate->isFuture(),
                    'day' => $weekStartDate->englishDayOfWeek,
                ]
            ]);

            $weekStartDate->addDays(7);
            $weekEndDate->addDays(7);
        }

        return $roundWeeksArray;
    }
}