<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'notes',
        'status'
    ];

    public function priorities() {
        return $this->hasMany(Priority::class);
    }

    public function getStockholdersWithPriority() {
        $stockholders = DB::table('priorities')
        ->join('users', 'priorities.user_id', '=', 'users.id')
        ->join('rounds', 'priorities.round_id', '=', 'rounds.id')
        ->select('users.id as id',
            'users.name as name',
            'users.email as email',
            'users.status as status',
            'priorities.round_id as round_id',
            'priorities.priority as priority',
            'rounds.name as round'
        )
        ->where('users.is_admin', 0)
        ->orderBy('priorities.priority')
        ->get();

        return $stockholders; 
    }

    public function getStockholdersWithPriorityAndRound($round_id) {
        $stockholders = DB::table('priorities')
        ->join('users', 'priorities.user_id', '=', 'users.id')
        ->join('rounds', 'priorities.round_id', '=', 'rounds.id')
        ->select('users.id as id',
            'users.name as name',
            'users.email as email',
            'users.status as status',
            'priorities.round_id as round_id',
            'priorities.priority as priority',
            'rounds.name as round'
        )
        ->where('users.is_admin', 0)
        ->where('rounds.id', $round_id)
        ->orderBy('priorities.priority')
        ->get();

        return $stockholders; 
    }

    public function rounds() {
        return $this->hasMany(Round::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
