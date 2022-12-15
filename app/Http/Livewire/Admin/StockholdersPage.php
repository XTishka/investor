<?php

namespace App\Http\Livewire\Admin;

use App\Models\Round;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class StockholdersPage extends Component
{
    use WithPagination;

    public $search;
    public $stockholder;
    public $export;
    public $perPage = 20;
    public $wishes_min = 1;
    public $wishes_max = 20;

    public $modal_create = false;
    public $modal_import = false;
    public $modal_export = false;
    public $notifications = false;

    public function render(Request $request)
    {
        $users = new User;
        if ($request->session()->get('active_round')) {
            $roundId = $request->session()->get('active_round');
            $stockholders = $users->searchRoundStockholders($roundId, $this->search, $this->perPage);
        } else {
            $stockholders = $users->searchAllStockholders($this->search, $this->perPage);
        }

        $groupedRounds = [
            'running' => Round::running()->toArray(),
            'future' => Round::future()->toArray(),
            'passed' => Round::passed()->toArray(),
        ];

        return view('livewire.admin.stockholders-page', compact('stockholders', 'groupedRounds'));
    }

    public function openModal($modal)
    {
        if ($modal == 'create') $this->modal_create = true;
        if ($modal == 'import') $this->modal_import = true;
        if ($modal == 'export') $this->modal_export = true;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->validate([
            'stockholder.name'      => 'required|string|max:255',
            'stockholder.email'     => 'required|string|email|max:255',
            'stockholder.password'  => 'required|string|min:8|regex:/(^[a-zA-Z]+[a-zA-Z0-9\\-]*$)/u',
            'stockholder.round'     => 'required',
            'stockholder.wishes'    => 'required|integer',
        ]);

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

    public function export()
    {
        $this->validate(['export.round' => 'required']);
        $this->reset(['stockholder']);
        $this->modal_export = false;
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
}
