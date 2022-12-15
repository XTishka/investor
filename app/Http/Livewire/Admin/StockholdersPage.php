<?php

namespace App\Http\Livewire\Admin;

use App\Exports\StockholderRoundExport;
use App\Exports\StockholdersAllExport;
use App\Exports\StockholdersRoundExport;
use App\Models\Round;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class StockholdersPage extends Component
{
    use WithPagination;

    public $search;
    public $stockholder;
    public $export = ['type' => 'all'];
    public $perPage = 20;
    public $wishes_min = 1;
    public $wishes_max = 20;

    public $timestamp;
    public $roundId;

    public $modal_create = false;
    public $modal_import = false;
    public $modal_export = false;
    public $notifications = false;

    public function mount(Request $request)
    {
        $this->timestamp = now()->timestamp;
        $this->roundId = $request->session()->get('active_round');
    }

    public function render()
    {
        $users = new User;
        if ($this->roundId) {
            $stockholders = $users->searchRoundStockholders($this->roundId, $this->search, $this->perPage);
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
            $priority = Round::query()->$round->users()->attach($stockholder->id, ['wishes' => $this->stockholder['wishes'], 'priority' => $priority]);
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('alert', ['type' => 'error',  'message' => 'Something went wrong on priority save.']);
        }
    }

    public function export()
    {
        debugbar()->info('1', $this->export);
        if ($this->export['type'] == 'all') {
            $this->reset(['export']);
            $this->modal_export = false;
            return Excel::download(new StockholdersAllExport, 'stockholders_' . $this->timestamp . '.csv');
        }

        if ($this->export['type'] == 'round') {
            $this->validate(['export.round' => 'required']);
            $file = Excel::download(new StockholderRoundExport($this->export['round']), 'stockholders.csv');
            $this->reset(['export']);
            $this->modal_export = false;
            return $file;

            // $this->validate(['export.round' => 'required']);
            // debugbar()->info('round: ' . $this->export['round']);
            // debugbar()->info($this->export['round']);
            // $exportFile = Excel::download(new StockholdersRoundExport($this->export['round']), 'stockholders_' . Round::find($this->roundId)->value('name') . '_' . $this->timestamp . '.csv');
            // $this->reset(['export']);
            // $this->modal_export = false;
            // return $exportFile;
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
}
