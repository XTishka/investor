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
    const WAITING   = 'waiting';
    const CONFIRMED = 'confirmed';
    const FAILED    = 'failed';

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
        if ($this->confirmed == true) :
            foreach ($this->getWishes() as $wish) :
                $wish = Wish::find($wish->id);
                $wish->update(['status' => self::WAITING]);
            endforeach;
        endif;
    }

    public function distributeLimits()
    {
        $wishes = $this->getWishes();
        $round  = Round::find($this->roundId);
        $users  = $round->users()->get();

        foreach ($users as $user) :
            $userWishes = $wishes->where('user_id', $user->id);
            $wishesLimit = $wishes->first()->limit;
            $confirmedWishes = 0;
            if ($userWishes->count() > 0) :
                foreach ($userWishes as $userWish) :
                    if ($wishesLimit > $confirmedWishes) :
                        $reserved = $wishes->where('week_code', $userWish->week_code)->where('property_id', $userWish->property_id)->where('status', self::CONFIRMED)->first();
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

        debugbar()->info('Total round wishes: ' . $wishes->count());
        $this->distributionSave($wishes);

        $wishes = $this->getWishes();
        debugbar()->info('Confirmed wishes: ' . $wishes->where('status', self::CONFIRMED)->count());
        debugbar()->info('Failed wishes: ' . $wishes->where('status', self::FAILED)->count());
        debugbar()->info('Waiting wishes: ' . $wishes->where('status', self::WAITING)->count());
    }

    public function distributeOverLimits()
    {
        debugbar()->info('distribute overlimits');
    }

    public function distributionSave($wishes)
    {
        foreach ($wishes as $wish) :
            $wishUpdate = Wish::find($wish->id);
            $wishUpdate->update(['status' => $wish->status]);
        endforeach;
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
            ->orderBy('wishes.priority')
            ->get();
    }

    public function render()
    {
        return view('livewire.dashboard.distribute');
    }
}
