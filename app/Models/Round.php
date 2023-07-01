<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Round extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'wishes_start_date',
        'wishes_end_date',
        'start_date',
        'end_date',
        'max_wishes',
        'overlimit',
        'active',
        'lock',
    ];
}
