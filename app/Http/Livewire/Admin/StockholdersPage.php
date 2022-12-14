<?php

namespace App\Http\Livewire\Admin;

use App\Models\Round;
use App\Models\User;
use App\Models\UserRound;
use Exception;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;

class StockholdersPage extends Component
{
    public $search;
    public $stockholder;
    public $wishes_min = 1;
    public $wishes_max = 20;

    public $modal_create = false;
    public $notifications = false;

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
        try {
            $stockholder = $this->storeStockholder();
            $this->storePriorities($stockholder);
            $this->sendEmail();
            $this->reset(['stockholder']);
            $this->modal_create = false;
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'New account was successfully created.']);
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('alert', ['type' => 'error',  'message' => 'Something goes wrong while account creation.']);
        }
    }

    public function storeStockholder()
    {
        return User::create([
            'name'      => $this->stockholder['name'],
            'email'     => $this->stockholder['email'],
            'password'  => Hash::make($this->stockholder['password']),
            'is_admin'  => 0,
        ]);
    }

    public function storePriorities($stockholder)
    {
        try {
            $round = Round::find($this->stockholder['round']);
            $round->users()->attach($stockholder->id, ['wishes' => $this->stockholder['wishes']]);
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('alert', ['type' => 'error',  'message' => 'Something went wrong on priority save.']);
        }
    }

    public function sendEmail()
    {
        debugbar()->info('Send email');
        $message = 'Email with user details was sent.';
        session()->flash('send_email', $message);
    }

    public function generatePassword()
    {
        $this->stockholder['password'] = Str::random(16);
    }

    public function render()
    {
        $stockholders = User::query()
            ->where('is_admin', '=', 0)
            ->where(function ($query) {
                $query->orWhere('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        $groupedRounds = [
            'running' => Round::running()->toArray(),
            'future' => Round::future()->toArray(),
            'passed' => Round::passed()->toArray(),
        ];

        return view('livewire.admin.stockholders-page', compact('stockholders', 'groupedRounds'));
    }
}
