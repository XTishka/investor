<?php

namespace App\Http\Livewire\Admin\Rounds;

use Livewire\Component;

class RoundEditForm extends Component
{
    public $name;
    public $stop_wishes_date;
    public $start_date;
    public $end_date;
    public $max_wishes = 20;
    public $description;

    public function mount()
    {

    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'stop_wishes_date' => ['date', 'after:today', 'before:start_date'],
            'start_date' => ['required', 'date', 'after:stop_wishes_date'],
            'end_date' => ['date', 'after:start_date'],
            'description' => ['nullable'],
            'max_wishes' => ['required'],
        ];
    }

    public function render()
    {
        return view('livewire.admin.rounds.round-edit-form');
    }
}
