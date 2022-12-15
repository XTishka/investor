<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RoundUser extends Pivot
{
    protected $fillable = ['wishes'];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function rounds() {
        return $this->belongsToMany(Round::class);
    }
}
