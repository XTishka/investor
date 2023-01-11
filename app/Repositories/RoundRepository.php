<?php

namespace App\Repositories;

use App\Models\Round;
use App\Interfaces\RoundRepositoryInterface;
use Carbon\Carbon;

class RoundRepository implements RoundRepositoryInterface
{
    public function getRunningRounds()
    {
        return Round::query()
            ->where('start_wishes_date', '<=', Carbon::now()->format('Y-m-d'))
            ->where('stop_wishes_date', '>=', Carbon::now()->format('Y-m-d'))
            ->get();
    }

    public function getFutureRounds()
    {
        return Round::query()
            ->where('start_wishes_date', '>=', Carbon::now()->format('Y-m-d'))
            ->get();
    }

    public function getPassedRounds()
    {
        return Round::query()
            ->where('stop_wishes_date', '<=', Carbon::now()->format('Y-m-d'))
            ->get();
    }

    public function getFirstRunningRound()
    {
        return Round::query()
            ->where('start_wishes_date', '<=', Carbon::now()->format('Y-m-d'))
            ->where('stop_wishes_date', '>=', Carbon::now()->format('Y-m-d'))
            ->first();
    }
}
