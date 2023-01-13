<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Repositories\RoundRepository;
use App\Models\Wish;
use Illuminate\Support\Facades\DB;

class Reset extends Component
{
    const WAITING   = 'waiting';
    const CONFIRMED = 'confirmed';
    const FAILED    = 'failed';

    public $modal;
    public $roundId;
    public $confirmed;

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
        $this->reset(['confirmed']);
        $this->modal = false;
    }

    public function distributeReset()
    {
        if ($this->confirmed === true) :
            foreach ($this->getWishes() as $wish) {
                $wish = Wish::find($wish->id);
                $wish->update(['status' => self::WAITING]);
            }
            $this->emit('refreshTable');
            $this->closeModal();
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
            ->orderBy('wishes.priority')
            ->get();
    }

    public function render()
    {
        return view('livewire.dashboard.reset');
    }
}
