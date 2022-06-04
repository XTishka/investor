<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Round extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'start_round_date',
        'end_wishes_date',
        'end_round_date',
        'max_wishes',
    ];

    public function currentRoundId()
    {
        $round = $this->select()
            ->where('start_round_date', '<=', Carbon::now()->format('Y-m-d'))
            ->where('end_round_date', '>=', Carbon::now()->format('Y-m-d'))
            ->value('id');
        return $round;
    }
}
