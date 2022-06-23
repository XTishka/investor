<?php

namespace App\Http\Traits;

use App\Models\Round;
use Carbon\Carbon;

trait ActiveRoundTrait
{
  public function roundsIsset()
  {
    if (Round::first()) return true;
    return false;
  }

  public function activeRound()
  {
    $round = Round::query()
      ->where('end_wishes_date', '>', Carbon::now())
      ->orderBy('end_wishes_date')
      ->first();

    if (!$round) {
      $round = Round::query()
        ->orderBy('end_wishes_date', 'DESC')
        ->first();
    }
    return $round;
  }
}
