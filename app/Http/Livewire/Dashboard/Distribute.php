<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Property;
use App\Models\Round;
use App\Models\Wish;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Repositories\RoundRepository;
use App\Services\WeeksService;
use Illuminate\Support\Facades\DB;

class Distribute extends Component
{
    const WAITING             = 'waiting';
    const CONFIRMED           = 'confirmed';
    const FAILED              = 'failed';
    const OVERLIMIT_CONFIRMED = 'overlimit_confirmed';
    const OVERLIMIT_FAILED    = 'overlimit_failed';

    public $modal = false;
    public $roundId;
    public $distributionType = 'simple';
    public $confirmed = false;

    public function mount(Request $request)
    {
        $this->roundId = $request->session()->get('active_round');

        if ($this->roundId == null) {
            $repository = new RoundRepository;
            $round = $repository->getLastEndedRound();
            if ($round == null) :
                $round = Round::query()->orderByDesc('stop_wishes_date')->first();
            endif;
            $this->roundId = $round->id;
        }
    }

    public function openModal()
    {
        $this->modal = true;
    }


    public function closeModal()
    {
        $this->reset(['confirmed', 'distributionType']);
        $this->modal = false;
    }

    public function distribute()
    {
        if ($this->confirmed) :

            if ($this->distributionType == 'simple') :
                $this->distributeReset();
                $this->distributeLimits();
            endif;

            if ($this->distributionType == 'overlimit') :
                $this->distributeReset();
                $this->distributeLimits();
                $this->distributeOverLimits();
            endif;

        endif;

        $this->emit('refreshTable');
        $this->closeModal();
    }

    public function distributeReset()
    {
        Wish::query()
            ->where('round_id', $this->roundId)
            ->update(['status' => self::WAITING]);
    }

    public function distributeLimits()
    {
        $round  = Round::query()->find($this->roundId);
        $wishes = Wish::query()->where('round_id', $this->roundId)->get();
        $stockholders = $round->users()->orderBy('priority')->get();

        foreach ($stockholders as $stockholder) :
            $wishesLimit = $round->users()->where('user_id', $stockholder->id)->first()->pivot->wishes;
            $confirmedWishes = 0;
            $userWishes  = $wishes
                ->where('user_id', $stockholder->id)
                ->sortBy('priority');

            foreach ($userWishes as $userWish) :
                if ($wishesLimit > $confirmedWishes) :
                    $reserved = $wishes
                        ->where('week_code', $userWish->week_code)
                        ->where('property_id', $userWish->property_id)
                        ->where('status', self::CONFIRMED)
                        ->first();

                    if ($reserved === null) :
                        $userWish->status = self::CONFIRMED;
                        $confirmedWishes++;
                    else :
                        $userWish->status = self::FAILED;
                    endif;
                endif;
            endforeach;
        endforeach;

        foreach ($wishes as $wish) :
            $wishUpdate = Wish::find($wish->id);
            $wishUpdate->update(['status' => $wish->status]);
        endforeach;
    }

    public function distributeOverLimits()
    {
        $round  = Round::query()->find($this->roundId);
        $wishes = Wish::query()
            ->where('round_id', $this->roundId)
            ->where('status', self::WAITING)
            ->get();
        $stockholders = $round->users()->orderBy('priority')->get();

        if ($wishes->count() > 0) :
            foreach ($stockholders as $stockholder) :
                $userWishes = $wishes->where('user_id', $stockholder->id)->sortBy('priority');
                if ($userWishes->count() > 0) :
                    $confirmedWish = false;
                    foreach ($userWishes as $userWish) :
                        if ($confirmedWish == false) :
                            $wishUpdate = Wish::find($userWish->id);

                            $reservedConfirmed = Wish::query()
                                ->where('week_code', $userWish->week_code)
                                ->where('property_id', $userWish->property_id)
                                ->where('status', self::CONFIRMED)
                                ->first();

                            $reservedOverlimitConfirmed = Wish::query()
                                ->where('week_code', $userWish->week_code)
                                ->where('property_id', $userWish->property_id)
                                ->Where('status', self::OVERLIMIT_CONFIRMED)
                                ->first();

                            if ($reservedConfirmed == null and $reservedOverlimitConfirmed == null) :
                                $wishUpdate->update(['status' => self::OVERLIMIT_CONFIRMED]);
                                $confirmedWish = true;
                            else :
                                $wishUpdate->update(['status' => self::OVERLIMIT_FAILED]);
                                $confirmedWish = false;
                            endif;
                        endif;
                    endforeach;
                endif;
            endforeach;
            $this->distributeOverLimits();
        endif;
    }

    public function render()
    {
        return view('livewire.dashboard.distribute');
    }
}