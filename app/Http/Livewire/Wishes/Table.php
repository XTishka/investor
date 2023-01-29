<?php

namespace App\Http\Livewire\Wishes;

use App\Models\Property;
use App\Models\Stockholder;
use App\Models\Wish;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class Table extends Component
{
    use WithPagination;

    public $search = '';
    public $roundId;
    public $perPage = 10;
    public $filter = [
        'stockholder' => '',
        'round'       => '',
        'property'    => '',
        'wish_status' => '',
    ];

    protected $listeners = ['updateTable' => '$refresh'];

    public function mount(Request $request)
    {
        $this->roundId = $request->session()->get('active_round');
    }

    public function render()
    {
        sleep(1);
        $wishes = ($this->roundId) ? $this->getRoundWishes() : $this->getAllWishes();
        return view('livewire.wishes.table', [
            'wishes' => $wishes
                ->when($this->filter['stockholder'], function ($query) {
                    $query->where('user_id', $this->filter['stockholder']);
                })
                ->when($this->filter['round'], function ($query) {
                    $query->where('round_id', $this->filter['round']);
                })
                ->when($this->filter['property'], function ($query) {
                    $query->where('property_id', $this->filter['property']);
                })
                ->when($this->filter['wish_status'], function ($query) {
                    $query->where('status', $this->filter['wish_status']);
                })
                ->paginate($this->perPage),
        ]);
    }

    public function resetFilter()
    {
        $this->reset('filter');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getAllWishes()
    {
        $wishes = new Wish();
        return $wishes->orderBy('created_at', 'desc');
    }

    public function getRoundWishes()
    {
        $wishes = new Wish();
        return $wishes->query()->where('round_id', $this->roundId)->orderBy('created_at', 'desc');
    }
}
