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
        // $this->databaseFix();
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

    public function databaseFix()
    {
        $properties = DB::table('properties_old')
            // ->join('round_user', 'wishes.user_id', '=', 'round_user.user_id')
            // ->join('users', 'round_user.user_id', '=', 'users.id')
            // ->join('properties', 'wishes.property_id', '=', 'properties.id')
            // ->select(
            //     'wishes.id as id',
            //     'wishes.status as status',
            //     'wishes.priority as priority',
            //     'wishes.week_code as week_code',
            //     'wishes.user_id as user_id',
            //     'round_user.priority as user_priority',
            //     'users.name as user_name',
            //     'wishes.property_id as property_id',
            //     'properties.name as property_name'
            // )
            // ->where('wishes.round_id', $round->id)
            // ->orderBy('round_user.priority')
            ->get();

        foreach ($properties as $property) :
            $wishesCount = Wish::query()->where('property_id', $property->id)->count();
            $hasBy = 'none';
            $byName = Property::query()->where('name', $property->name)->first();
            // $byAddress = Property::query()->where('address', 'Via Nazionale nr.70  28824 Oggebbio VB')->first();

            if ($byName) :
                if ($byName->name == $property->name) $hasBy = 'name';
                Wish::query()->where('property_id', $property->id)->update(['property_id' => $byName->id]);
            endif;

            // if ($byAddress) :
            //     if ($byAddress->address == $property->address) $hasBy = 'address';
            // endif;

            if ($hasBy == 'none') :
                Property::query()->create([
                    'name' => $property->name,
                    'country' => $property->country,
                    'address' => $property->address,
                    'description' => $property->description,
                    'deleted_at' => now(),
                ]);
            endif;

            if ($hasBy == 'none' and $wishesCount > 0) :
            // debugbar()->info("Property: $property->name ($property->id) :: Wishes($wishesCount) :: Has by: $hasBy");
            endif;
        endforeach;

        foreach ($properties as $property) :
            Wish::query()->where('property_id', $property->id)->update(['property_id' => $byName->id]);
            if ($wishesCount > 0) :
                debugbar()->info("Property: $property->name ($property->id) :: Wishes($wishesCount)");
            endif;
        endforeach;
    }
}
