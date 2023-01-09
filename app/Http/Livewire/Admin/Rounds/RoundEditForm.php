<?php

namespace App\Http\Livewire\Admin\Rounds;

use Livewire\Component;
use Exception;

class RoundEditForm extends Component
{
    public $round;
    public $name;
    public $stop_wishes_date;
    public $start_date;
    public $end_date;
    public $max_wishes = 20;
    public $description;
    public $flashAnchor = '';
    public $flashMessage = '';

    public function mount()
    {
        $this->name = $this->round->name;
        $this->stop_wishes_date = $this->round->stop_wishes_date;
        $this->start_date = $this->round->start_date;
        $this->end_date = $this->round->end_date;
        $this->max_wishes = $this->round->max_wishes;
        $this->description = $this->round->description;
    }

    public function updateRound()
    {
        $this->validate();

        try {
            $this->round->update([
                'name' => $this->name,
                'stop_wishes_date' => $this->stop_wishes_date,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'max_wishes' => $this->max_wishes,
                'description' => $this->description,
            ]);
            $this->message = true;
            $this->flashAnchor = 'form_save__success';
            $this->flashMessage = 'Round details successfully updated';
        } catch (Exception $e) {
            $this->message = true;
            $this->flashAnchor = 'form_save__error';
            $this->flashMessage = 'Error! Data has not beed saved';
        }
        session()->flash($this->flashAnchor, __($this->flashMessage));
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'stop_wishes_date' => ['date', 'before:start_date'],
            'start_date' => ['required', 'date', 'after:stop_wishes_date'],
            'end_date' => ['date', 'after:start_date'],
            'description' => ['nullable'],
            'max_wishes' => ['required'],
        ];
    }

    public function render()
    {
        return view('livewire.admin.rounds.round-edit-form', [
            'flashAnchor' => $this->flashAnchor,
        ]);
    }
}
