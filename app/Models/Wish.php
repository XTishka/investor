<?php

namespace App\Models;

use App\Http\Livewire\WishForm;
use App\Models\Wish as ModelsWish;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Barryvdh\Debugbar\Facades\Debugbar;

class Wish extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'week_id', 'property_id', 'status', 'priority'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function week()
    {
        return $this->belongsTo(Week::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class)->withTrashed();
    }

    public function dashboardWishes($roundId) {
        return Wish::query()
            ->join('users', 'wishes.user_id', '=', 'users.id')
            ->join('weeks', 'wishes.week_id', '=', 'weeks.id')
            ->join('priorities', function($join) use ($roundId) {
                $join->on('wishes.user_id', '=', 'priorities.user_id');
                $join->on('priorities.round_id', '=', DB::raw($roundId));
            })
            ->join('properties', 'wishes.property_id', '=', 'properties.id')
            ->select(
                'wishes.id as id',
                'wishes.user_id as user_id',
                'priorities.priority as user_priority',
                'users.name as user_name',
                'wishes.priority as priority',
                'wishes.week_id as week_id',
                'wishes.property_id as property_id',
                'properties.name as property_name',
                'wishes.status as status',
                'weeks.number as number',
                'weeks.id as week_id',
                'weeks.start_date as week_start',
                'weeks.end_date as week_end'
            )
            ->where('weeks.round_id', $roundId)
            ->orderBy('priorities.priority')
            ->orderBy('weeks.id')
            ->get();
    }

    public function usedRoundWishes($round_id): \Illuminate\Support\Collection
    {
        $wishes = DB::table('wishes')
            ->join('weeks', 'wishes.week_id', '=', 'weeks.id')
            ->join('properties', 'wishes.property_id', '=', 'properties.id')
            ->select(
                'wishes.id as wish_id',
                'weeks.number as week_number',
                'weeks.start_date as week_start_date',
                'weeks.end_date as week_end_date',
                'properties.name as property_name',
                'properties.country as property_country',
                'properties.address as property_address',
            )
            ->where('wishes.user_id', auth()->user()->id)
            ->where('weeks.round_id', $round_id)
            ->get();
        return $wishes;
    }

    public function usedPropertyRoundWishes($round_id, $property_id): \Illuminate\Support\Collection
    {
        $wishes = DB::table('wishes')
            ->join('weeks', 'wishes.week_id', '=', 'weeks.id')
            ->join('properties', 'wishes.property_id', '=', 'properties.id')
            ->select(
                'wishes.id as wish_id',
                'weeks.number as week_number',
                'weeks.start_date as week_start_date',
                'weeks.end_date as week_end_date',
                'properties.name as property_name',
                'properties.country as property_country',
                'properties.address as property_address',
            )
            ->where('wishes.user_id', auth()->user()->id)
            ->where('weeks.round_id', $round_id)
            ->where('properties.id', $property_id)
            ->get();
        return $wishes;
    }
}
