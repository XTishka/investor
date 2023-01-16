<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use App\Services\RoundServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
    public function cabinet()
    {
        if (auth()->user()->is_admin == 1) return redirect(route('admin.dashboard'));

        $service = new RoundServices;

        $round = $service->getActiveRound();
        if (!$round) return view('no-available-rounds');
        debugbar()->info($round);

        $stockholder = $round->users()->where('user_id', auth()->user()->id)->first();
        if (!$stockholder) return view('no-available-rounds');

        return view('cabinet', [
            'round' => $round,
            'stockholder' => $stockholder,
        ]);
    }

    public function profile()
    {
        return view('profile');
    }
}
