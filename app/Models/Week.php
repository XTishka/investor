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

    protected $fillable = ['year', 'number', 'round_id'];

    public function round(): BelongsTo
    {
        return $this->belongsTo(Round::class);
    }

    public function start_date()
    {
        $date = Carbon::now();
        $date->setISODate($this->year, $this->number);
        return $date->startOfWeek()->format('Y-m-d');
    }

    public function end_date()
    {
        $date = Carbon::now();
        $date->setISODate($this->year, $this->number);
        return $date->endOfWeek()->format('Y-m-d');
    }

    public function status()
    {
        $status = 'current';
        $currentDate = Carbon::now();
        if ($currentDate->lessThan($this->start_date())) $status = 'waiting';
        if ($currentDate->greaterThan($this->end_date())) $status = 'passed';
        return $status;
    }
}
