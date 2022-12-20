<?php

namespace App\Interfaces;

interface RoundRepositoryInterface
{
    public function getRunningRounds();
    public function getFutureRounds();
    public function getPassedRounds();
}
