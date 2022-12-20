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
            ->where('start_date', '<=', Carbon::now()->format('Y-m-d'))
            ->where('end_date', '>=', Carbon::now()->format('Y-m-d'))
            ->get();
    }

    public function getFutureRounds()
    {
        return Round::query()
            ->where('start_date', '>=', Carbon::now()->format('Y-m-d'))
            ->get();
    }

    public function getPassedRounds()
    {
        return Round::query()
            ->where('end_date', '<=', Carbon::now()->format('Y-m-d'))
            ->get();
    }
}
