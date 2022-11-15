<?php

namespace App\Http\Livewire\Admin\Rounds;

use Livewire\Component;
use App\Models\Round;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoundRegistrationForm extends Component
{
    public $name;
    public $stop_wishes_date;
    public $start_date;
    public $end_date;
    public $max_wishes = 20;
    public $description;

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

    public function storeRound()
    {
        $this->validate();
        try {
            Round::create([
                'name' => $this->name,
                'stop_wishes_date' => $this->stop_wishes_date,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'max_wishes' => $this->max_wishes,
                'description' => $this->description,
            ]);
        } catch (Exception $e) {
            $this->message = true;
            session()->flash('form_save__error', __('Error! Data has not beed saved'));
        }

        return redirect()->route('admin.rounds');
    }

    public function render()
    {
        return view('livewire.admin.rounds.round-registration-form');
    }
}
