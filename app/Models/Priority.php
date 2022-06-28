<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'round_id', 'priority', 'available_weeks', 'available_properties'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function round()
    {
        return $this->belongsTo(Round::class);
    }

    public function uniqueRoundProperty($userId, $roundId)
    {
        $count = $this->query()
            ->where('user_id', $userId)
            ->where('round_id', $roundId)
            ->count();

        return $count > 0 ? false : true;
    }
}
