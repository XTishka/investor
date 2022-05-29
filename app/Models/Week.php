<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Week extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['year', 'number', 'round_id', 'start_date', 'end_date'];

    public function round(): BelongsTo
    {
        return $this->belongsTo(Round::class);
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
