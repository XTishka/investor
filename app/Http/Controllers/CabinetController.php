<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use App\Services\RoundServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
    public $hasAccessToRound = false;
    public $maxWishes = 0;

    public function __invoke()
    {

        $service = new RoundServices;
        $round = $service->getActiveRound();
        $stockholder = $round->users()->where('user_id', auth()->user()->id)->first();
        if ($stockholder) {
            $this->hasAccessToRound = true;
            $this->maxWishes = $stockholder->pivot->wishes;

            if ($this->maxWishes > 0) {
                $usedWishes = Wish::query()->where('round_id', $round->id)->where('user_id', $stockholder->id)->count();
                return view('cabinet', [
                    'round' => $round,
                    'usedWishes' => $usedWishes,
                    'stockholder' => $stockholder,
                    'hasAccessToRound' => $this->hasAccessToRound,
                    'maxWishes' => $this->maxWishes,
                ]);
            }
        }
        return view('no-available-rounds');
    }
}
