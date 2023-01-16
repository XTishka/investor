<?php

namespace App\Services;

use App\Interfaces\RoundRepositoryInterface;
use App\Models\Round;
use App\Repositories\RoundRepository;
use App\Models\User;
use Carbon\Carbon;

class RoundServices
{
    private RoundRepositoryInterface $roundRepository;

    public function __construct()
    {
        $this->roundRepository = new RoundRepository;
    }

    public function getGroupedRounds()
    {
        return [
            'running' => $this->roundRepository->getRunningRounds()->toArray(),
            'future'  => $this->roundRepository->getFutureRounds()->toArray(),
            'passed'  => $this->roundRepository->getPassedRounds()->toArray(),
        ];
    }

    public function getGroupedRoundWishes($stockholderId)
    {
        $rounds = $this->getGroupedRounds();
        $user = User::find($stockholderId);
        $roundWishes = $user->rounds()->get();

        foreach ($roundWishes as $round) {
            $rounds[$round->id] = $round->pivot->wishes;
        }

        return $rounds;
    }

    public function getActiveRound()
    {
        $round = $this->roundRepository->getActiveRound();
        if ($round) {
            $startWishesDate = Carbon::parse($round->start_wishes_date);
            $stopWishesDate  = Carbon::parse($round->stop_wishes_date);
            $round->inWishesRange = (Carbon::now()->between($startWishesDate, $stopWishesDate, true) == true) ? true : false;
        }
        return $round;
    }
}
