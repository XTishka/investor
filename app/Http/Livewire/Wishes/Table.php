<?php

namespace App\Http\Livewire\Wishes;

use App\Models\Wish;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class Table extends Component
{
    use WithPagination;

    public $search = '';
    public $roundId;
    public $perPage = 20;

    protected $listeners = ['updateTable' => '$refresh'];

    public function mount(Request $request)
    {
        $this->roundId = $request->session()->get('active_round');
    }

    public function render()
    {
        sleep(1);
        $wishes = ($this->roundId) ? $this->getRoundWishes() : $this->getAllWishes();
        return view('livewire.wishes.table', compact('wishes'));
    }

    public function getAllWishes()
    {
        $wishes = new Wish();
        return $wishes->query()
            // ->search(trim($this->search))
            ->paginate($this->perPage);
    }

    public function getRoundWishes()
    {
        $wishes = new Wish();
        return $wishes->query()
            ->where('round_id', $this->roundId)
            ->paginate($this->perPage);
    }
}
