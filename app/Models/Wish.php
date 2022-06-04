<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Wish extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'week_id', 'property_id'];

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
        return $this->belongsTo(Property::class);
    }

    public function usedRoundWishes(): \Illuminate\Support\Collection
    {
        $wishes = DB::table('wishes')
            ->join('weeks', 'wishes.week_id', '=', 'weeks.id')
            ->join('properties', 'wishes.property_id', '=', 'properties.id')
            ->select('wishes.id as wish_id',
                'weeks.number as week_number',
                'weeks.start_date as week_start_date',
                'weeks.end_date as week_end_date',
                'properties.name as property_name',
                'properties.country as property_country',
                'properties.address as property_address',
            )
            ->where('wishes.user_id', auth()->user()->id)
            ->where('weeks.round_id', 1)
            ->get();
        return $wishes;
    }
}
