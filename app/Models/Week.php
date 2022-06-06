<?php

namespace App\Models;

use Barryvdh\Debugbar\Facades\Debugbar;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Week extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['year', 'number', 'round_id', 'start_date', 'end_date'];

    public function round(): BelongsTo
    {
        return $this->belongsTo(Round::class);
    }

    public function availibility($week_id, $property_id) {
        $qty = PropertyAvailability::where('week_id', $week_id)->where('property_id', $property_id)->count();
        return ($qty > 0) ? false : true;
    }

    public function hasWishes($week_id, $property_id) {
        $qty = Wish::where('week_id', $week_id)->where('property_id', $property_id)->count();
        return ($qty > 0) ? true : false;
    }

    public function status()
    {
        $status = 'current';
        $currentDate = Carbon::now();
        if ($currentDate->lessThan($this->start_date)) $status = 'waiting';
        if ($currentDate->greaterThan($this->end_date)) $status = 'passed';
        return $status;
    }
}
