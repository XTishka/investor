<?php

namespace App\Services;

use App\Models\Round;
use App\Models\User;
use App\Models\Wish;

class RoundService
{
    public function roundHasOverLimits($roundId)
    {
        return Round::query()->where('id', $roundId)->pluck('overlimit');
    }
}
