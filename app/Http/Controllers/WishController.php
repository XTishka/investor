<?php

namespace App\Http\Controllers;

use App\Http\Middleware\IsAdmin;
use App\Models\Property;
use App\Models\PropertyAvailability;
use App\Models\Round;
use App\Models\Week;
use App\Models\Wish;
use Illuminate\Http\Request;
use App\Http\Requests\WishRequest;
use App\Http\Traits\ActiveRoundTrait;
use App\Models\Priority;
use Illuminate\Http\JsonResponse;

class WishController extends Controller
{
    use ActiveRoundTrait;

    public function index(Round $round, Wish $wishes)
    {
        if (auth()->user()->is_admin) return redirect()->route('admin.dashboard');

        $userId = auth()->user()->id;
        $roundId = $this->activeRound()->id;

        $countries = Property::select('country')->distinct()->orderBy('country')->get();
        $usedWishes = $wishes->usedRoundWishes($this->activeRound()->id)->sortBy('week_number');
        $maxRoundWishes = $round->find($this->activeRound()->id)->value('max_wishes');
        $availableWishes = $maxRoundWishes - $usedWishes->count();

        return view('wisher', compact('userId', 'roundId', 'countries', 'usedWishes', 'availableWishes'));
    }

    public function store(WishRequest $request, Wish $wishes)
    {
        $validatedRequest = $request->validated();
        $validatedRequest['user_id'] = auth()->user()->id;

        $wishesQty = $wishes->usedRoundWishes($this->activeRound()->id)->count();

        $wish = Wish::firstOrCreate(
            [
                'user_id' => $validatedRequest['user_id'],
                'week_id' => $validatedRequest['week_id'],
                'property_id' => $validatedRequest['property_id'],
                'priority' => $wishesQty + 1,
            ]
        );

        if ($wish->wasRecentlyCreated == true) {
            $flashType = 'success';
            $message = __('front.success_message');
        } else {
            $flashType = 'warning';
            $message = __('front.error_message');
        }

        return back()->with($flashType, $message);
    }

    public function delete($id)
    {
        // TODO:: Add updating of priorities after delete
        $wish = Wish::find($id);
        $wish->delete();
        return back();
    }

    public function noRounds() {
        if ($this->activeRound()) return redirect()->route('wisher');
        return view('noRounds');
    }
}
