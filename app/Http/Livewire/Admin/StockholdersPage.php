<?php

namespace App\Http\Livewire\Admin;

use App\Models\Round;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

class StockholdersPage extends Component
{
    public $search;
    public $stockholder;
    public $wishes_min = 1;
    public $wishes_max = 20;

    public $modal_create = false;

    public function rules()
    {
        return [
            'stockholder.name' => 'required|string|max:255',
            'stockholder.email' => 'required|string|email|max:255',
            'stockholder.password' => 'required|string|min:8|regex:/(^[a-zA-Z]+[a-zA-Z0-9\\-]*$)/u',
            'stockholder.round' => 'required',
            'stockholder.wishes' => 'required|integer',
        ];
    }

    public function openModal($modal)
    {
        if ($modal == 'create') $this->modal_create = true;
    }

    public function create()
    {
        $this->validate();
        debugbar()->info('create stockholder');
        session()->flash('message', __('Account was successfully created.'));
    }

    public function generatePassword()
    {
        $this->stockholder['password'] = Str::random(16);
    }

    public function render()
    {
        $stockholders = User::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy('name')
            ->paginate(10);

        $groupedRounds = [
            'running' => Round::running()->toArray(),
            'future' => Round::future()->toArray(),
            'passed' => Round::passed()->toArray(),
        ];

        debugbar()->info($this->stockholder);

        return view('livewire.admin.stockholders-page', compact('stockholders', 'groupedRounds'));
    }
}
