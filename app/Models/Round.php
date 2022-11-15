<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'stop_wishes_date', 'start_date', 'end_date', 'max_wishes', 'description'];
}
