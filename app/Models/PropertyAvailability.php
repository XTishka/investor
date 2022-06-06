<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyAvailability extends Model
{
    use HasFactory;

    protected $fillable = ['round_id', 'property_id', 'week_id'];

    public function round()
    {
        return $this->belongsTo(Round::class);
    }

    public function week()
    {
        return $this->belongsTo(Week::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function checkAvailability($week_id, $property_id) {
        $weekAvailable = $this->where('week_id', $week_id)->where('property_id', $property_id)->count();
        return ($weekAvailable > 0) ? false : true;
    }
}
