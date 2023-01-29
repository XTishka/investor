<?php

namespace App\Http\Traits;

use App\Models\Round;
use App\Repositories\RoundRepository;

trait ActiveRoundTrait
{
    public function activeRound($request)
    {
        $repository = new RoundRepository;

        $round = Round::query()->find($request->session()->get('active_round'));
        if ($round == null) $round = $repository->getLastEndedRound();
        if ($round == null) $round = Round::query()->orderByDesc('stop_wishes_date')->first();

        return $round;
    }
}
