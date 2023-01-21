<?php

namespace App\Services;

use App\Models\Round;
use App\Models\User;
use App\Models\Wish;

class RoundService
{
    public function roundHasOverLimits($roundId)
    {
        $round = Round::query()
            ->where('id', $roundId)
            ->first();
        return boolval($round->overlimit);
    }
}
