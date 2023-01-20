<?php

namespace App\Services;

use App\Models\Round;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;
use App\Models\Week;
use App\Models\Wish;

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
                    'number'        => str_pad($weekStartDate->weekOfYear, 2, 0, STR_PAD_LEFT) + 1,
                    'date'          => $weekStartDate->format('Y-m-d'),
                    'human_date'    => $weekStartDate->format('j F, Y'),
                    'status'        => $weekStartDate->isPast(),
                    'day'           => $weekStartDate->englishDayOfWeek,
                ],
                'week_end'      => [
                    'number'        => str_pad($weekEndDate->weekOfYear, 2, 0, STR_PAD_LEFT),
                    'date'          => $weekEndDate->format('Y-m-d'),
                    'human_date'    => $weekEndDate->format('j F, Y'),
                    'status'        => $weekEndDate->isFuture(),
                    'day'           => $weekStartDate->englishDayOfWeek,
                ],
                'code' => $weekStartDate->year . (str_pad($weekStartDate->weekOfYear, 2, 0, STR_PAD_LEFT) + 1),
            ]);

            $weekStartDate->addDays(7);
            $weekEndDate->addDays(7);
        }

        return $roundWeeksArray;
    }

    public function roundWeeksWithStatus($start_date, $end_date, $roundId, $propertyId)
    {
        // TODO::Better to make via DB request without foreach
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

    public function roundPropertyAvailableWeeks($start_date, $end_date, $roundId, $propertyId, $userId)
    {
        // TODO::Better to make via DB request without foreach
        $weeks = $this->roundWeeks($start_date, $end_date);

        // Check in unavailable weeks
        foreach ($weeks as $key => $week) {
            $unavailable = Week::query()
                ->where('code', $week['code'])
                ->where('round_id', $roundId)
                ->where('property_id', $propertyId)
                ->exists();
            if ($unavailable === true) unset($weeks[$key]);
        }

        // Check in wishes
        foreach ($weeks as $key => $week) {
            $wishes = Wish::query()
                ->where('user_id', $userId)
                ->where('week_code', $week['code'])
                ->where('round_id', $roundId)
                ->where('property_id', $propertyId)
                ->exists();
            if ($wishes === true) unset($weeks[$key]);
        }

        return $weeks;
    }

    public function getWeekDatesFromCode($code)
    {
        $start = Carbon::now();
        $weekNumber = substr($code, 4);
        $year = substr($code, 0, 4);
        $startDate = $start->setISODate($year, $weekNumber);

        $end = Carbon::parse($startDate->format('Y-m-d'));
        $endDate = $end->addWeek();

        $dates = [
            'start' => $startDate->startOfWeek(Carbon::SATURDAY),
            'end' => $endDate->startOfWeek(Carbon::SATURDAY),
        ];
        return $dates;
    }
}
