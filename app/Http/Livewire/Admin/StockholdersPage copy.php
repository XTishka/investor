<?php

namespace App\Http\Livewire\Admin;

use App\Models\Round;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StockholdersPage extends Component
{
    public $search;
    public $stockholder;
    public $rounds;
    public $name;
    public $email;
    public $password;
    public $sendPassword = true;
    public $createForm = false;
    public $stockholders_rounds = 'all';

    public function createForm()
    {
        debugbar()->info('create');
        $this->createForm = true;
    }

    public function createStockholder() {
        debugbar()->info('create stockholder');
        debugbar()->info($this->stockholder);
    }

    public function import()
    {
        debugbar()->info('import');
    }

    public function export()
    {
        debugbar()->info('export');
    }

    public function view($id)
    {
        debugbar()->info('view: ' . $id);
    }

    public function edit($id)
    {
        debugbar()->info('edit: ' . $id);
    }

    public function delete($id)
    {
        debugbar()->info('delete: ' . $id);
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

        return view('livewire.admin.stockholders-page', compact('stockholders', 'groupedRounds'));
    }
}
