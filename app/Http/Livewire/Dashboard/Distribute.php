<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Round;
use App\Models\Wish;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Repositories\RoundRepository;
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
    public $confirmed = true;

    public function mount(Request $request)
    {
        $this->roundId = $request->session()->get('active_round');

        if ($this->roundId == null) {
            $repository = new RoundRepository;
            $round = $repository->getLastEndedRound();
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
        foreach ($this->getWishes() as $wish) :
            $wish = Wish::find($wish->id);
            $wish->update(['status' => self::WAITING]);
        endforeach;
    }

    public function distributeLimits()
    {
        $wishes = $this->getWishes();
        $round  = Round::find($this->roundId);
        $users  = $round->users()->orderBy('priority')->get();

        foreach ($users as $user) :
            $userWishes = $wishes->where('user_id', $user->id)->sortBy('priority');
            $confirmedWishes = 0;
            if ($userWishes->count() > 0) :
                $wishesLimit = $userWishes->first()->limit;

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
            endif;
        endforeach;

        foreach ($wishes as $wish) :
            $wishUpdate = Wish::find($wish->id);
            $wishUpdate->update(['status' => $wish->status]);
        endforeach;
    }

    public function distributeOverLimits()
    {
        $waitingWishes = $this->getWishes()->where('status', self::WAITING);
        $round  = Round::find($this->roundId);
        $users  = $round->users()->orderBy('priority')->get();

        if ($waitingWishes->count() > 0) :
            foreach ($users as $user) :
                $userWish = $waitingWishes->where('user_id', $user->id)->sortBy('priority')->first();
                if ($userWish) :
                    $wishUpdate = Wish::find($userWish->id);
                    $reserved = Wish::query()
                        ->where('week_code', $userWish->week_code)
                        ->where('property_id', $userWish->property_id)
                        ->where('status', self::CONFIRMED)
                        ->orWhere('status', self::OVERLIMIT_CONFIRMED)
                        ->first();

                    if ($reserved == null) :
                        $wishUpdate->update(['status' => self::OVERLIMIT_CONFIRMED]);
                    else :
                        $wishUpdate->update(['status' => self::OVERLIMIT_FAILED]);
                    endif;
                endif;
            endforeach;
            $this->distributeOverLimits();
        endif;
    }

    public function getWishes()
    {
        return DB::table('wishes')
            ->join('round_user', 'wishes.user_id', '=', 'round_user.user_id')
            ->join('users', 'round_user.user_id', '=', 'users.id')
            ->join('properties', 'wishes.property_id', '=', 'properties.id')
            ->select(
                'wishes.id as id',
                'wishes.status as status',
                'wishes.priority as priority',
                'round_user.wishes as limit',
                'wishes.week_code as week_code',
                'wishes.user_id as user_id',
                'round_user.priority as user_priority',
                'users.name as user_name',
                'wishes.property_id as property_id',
                'properties.name as property_name'
            )
            ->where('wishes.round_id', $this->roundId)
            ->orderBy('round_user.priority')
            ->get();
    }

    public function render()
    {
        return view('livewire.dashboard.distribute');
    }
}
