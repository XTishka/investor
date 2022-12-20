<?php

namespace App\Http\Livewire\Admin;

use App\Exports\StockholderRoundExport;
use App\Exports\StockholdersAllExport;
use App\Models\Round;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithFileUploads;

class StockholdersPage extends Component
{
    use WithPagination, WithFileUploads;

    public $search;
    public $stockholder;
    public $perPage = 20;
    public $wishes_min = 1;
    public $wishes_max = 20;

    public $timestamp;
    public $roundId;

    public $modal_create = false;
    public $modal_import = false;
    public $modal_export = false;
    public $notifications = false;

    public $export = ['type' => 'all'];
    public $import = [
        'to'                        => false,
        'from'                      => 'round',
        'from_resource'             => false,
        'option_remove_all'         => false,
        'option_update'             => false,
        'option_update_by'          => 'id',
        'option_create'             => false,
        'option_create_with_email'  => false,
    ];

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

        return view('livewire.admin.stockholders-page', compact('stockholders'));
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
            'stockholder.email'     => 'required|string|email|max:255|unique:users,email',
            'stockholder.password'  => 'required|string|min:8|regex:/(^[a-zA-Z]+[a-zA-Z0-9\\-]*$)/u',
            'stockholder.round'     => 'required',
            'stockholder.wishes'    => 'required|integer',
        ]);

        try {
            if ($stockholder = $this->storeStockholder()) {
                $this->storePriorities($stockholder->id, $this->stockholder['round'], $this->stockholder['wishes']);
                $this->sendEmail();
                $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'New account was successfully created.']);
                $this->reset(['stockholder']);
                $this->modal_create = false;
            }
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

    public function storePriorities($stockholderId, $roundId, $wishes = 0, $priority = 1)
    {
        try {
            // debugbar()->info($stockholderId, $roundId, $wishes, $priority);
            $round = Round::find($roundId);
            $round->users()->detach($stockholderId);
            $round->users()->attach($stockholderId, ['wishes' => $wishes, 'priority' => $priority]);
        } catch (Exception $e) {
            $this->dispatchBrowserEvent('alert', ['type' => 'error',  'message' => 'Something went wrong on priority save.']);
            debugbar()->info($e);
        }
    }

    public function import()
    {
        if ($this->import['from'] == 'round') $this->importFromRound();
        if ($this->import['from'] == 'all') $this->importFromAll();
        if ($this->import['from'] == 'file') $this->importFromFile();
        $this->modal_import = false;
    }

    public function importFromRound()
    {
        $this->validate(['import.to' => 'required', 'import.from_resource' => 'required|numeric']);
        $round = Round::query()->find($this->import['from_resource']);
        $stockholders = $round->users()->where('is_admin', '!=', 1)->get();
        foreach ($stockholders as $stockholder) {
            debugbar()->info($this->import['from_resource']);
            $this->storePriorities($stockholder->id, $this->import['from_resource']);
        }
    }

    public function importAll()
    {
        $this->validate(['import.to' => 'required']);
        $count = 0;
        foreach (User::query()->where('is_admin', '!=', 1) as $stockholder) {
            debugbar()->error($count++);
            // $this->storePriorities($stockholder);
        }
    }

    public function importFromFile()
    {
        debugbar()->info('Import from file');
    }

    public function export()
    {
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
        }
    }

    public function sendEmail()
    {
        $message = 'Email with user details was sent.';
        session()->flash('send_email', $message);
    }

    public function generatePassword()
    {
        $this->stockholder['password'] = Str::random(16);
    }
}
