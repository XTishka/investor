<?php

namespace App\Http\Livewire\Rounds;

use Livewire\Component;
use App\Models\Round;
use Exception;

class Create extends Component
{
    public $modal = false;
    public $name;
    public $wishes_start;
    public $wishes_stop;
    public $round_start;
    public $round_end;
    public $max_wishes = 0;
    public $overlimit  = 0;
    public $publicate  = 0;
    public $active     = 0;
    public $lock       = 0;
    public $description;

    public function rules()
    {
        return [
            'name'          => ['required', 'string', 'max:255'],
            'wishes_start'  => ['required', 'date', 'before:wishes_stop'],
            'wishes_stop'   => ['required', 'date', 'after:wishes_start', 'before:round_start'],
            'round_start'   => ['required', 'date', 'after:wishes_stop', 'before:round_end'],
            'round_end'     => ['required', 'date', 'after:round_start'],
            'max_wishes'    => ['required'],
            'overlimit'     => ['boolean'],
            'publicate'     => ['boolean'],
            'active'        => ['boolean'],
            'lock'          => ['boolean'],
            'description'   => ['nullable'],
        ];
    }

    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->reset(['name', 'wishes_start', 'wishes_stop', 'round_start', 'round_end', 'description', 'max_wishes', 'overlimit', 'publicate', 'active', 'lock']);
        $this->modal = false;
    }

    public function save()
    {
        $this->validate();

        try {
            if ($this->active == 1) Round::query()->where('active', 1)->update(['active' => 0]);
            $round = Round::create([
                'name'              => $this->name,
                'start_wishes_date' => $this->wishes_start,
                'stop_wishes_date'  => $this->wishes_stop,
                'start_date'        => $this->round_start,
                'end_date'          => $this->round_end,
                'max_wishes'        => $this->max_wishes,
                'overlimit'         => $this->overlimit,
                'publicate'         => $this->publicate,
                'active'            => $this->active,
                'lock'              => $this->lock,
                'description'       => $this->description,
            ]);
            $this->emit('roundCreateSuccess');
            $this->emit('refreshTable');
            $this->closeModal();
        } catch (Exception $e) {
            $this->emit('roundCreateError');
        }
    }

    public function render()
    {
        return view('livewire.rounds.create');
    }
}