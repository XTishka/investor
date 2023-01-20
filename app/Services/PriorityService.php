<?php

namespace App\Services;

use App\Interfaces\RoundRepositoryInterface;
use App\Models\Round;
use App\Repositories\RoundRepository;
use App\Models\User;

class PriorityService
{

    public function roundAutoPriority($roundId, $stockholderId)
    {
        $round = Round::query()->find($roundId);
        $qty = $round->users()->count();
        $return = ($qty > 0) ? $qty + 1 : 1;
    }
}
