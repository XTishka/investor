<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Round extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'stop_wishes_date',
        'start_date',
        'end_date',
        'max_wishes',
        'description',
    ];

    public function current()
    {
        // return $this->query()
        //     ->firstOrFail()
        //     ->where('start_date', '<=', Carbon::now()->format('Y-m-d'))
        //     ->where('end_date', '>=', Carbon::now()->format('Y-m-d'))
        //     ->get();

        return $this->query()->find(1);
    }

    public function future()
    {
    }

    public function passed()
    {
    }
}
