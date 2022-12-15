<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\Models\RoundUser;
use Illuminate\Support\Facades\DB;

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

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot(['wishes']);
    }

    public function stockholders($round_id, $search)
    {
        return RoundUser::query()
            ->join('users', 'round_user.user_id', '=', 'users.id')
            ->join('rounds', 'round_user.round_id', '=', 'rounds.id')
            ->select(
                'users.id as id',
                'users.name as name',
                'users.email as email',
                'users.status as status',
                // 'users.profile_photo_url as profile_photo_url',
                'round_user.round_id as round_id',
                'round_user.priority as priority',
                'round_user.wishes as wishes',
                'rounds.name as round'
            )
            ->where('users.is_admin', 0)
            ->where('rounds.id', $round_id)
            ->where('users.name', 'like', '%' . $search . '%')
            ->orWhere('users.email', 'like', '%' . $search . '%')
            ->where('rounds.id', 'like', $round_id)
            ->orderBy('round_user.priority')
            ->paginate(10);

        // return DB::table('round_user')
        //     ->join('users', 'round_user.user_id', '=', 'users.id')
        //     ->join('rounds', 'round_user.round_id', '=', 'rounds.id')
        //     ->select(
        //         'users.id as id',
        //         'users.name as name',
        //         'users.email as email',
        //         'users.status as status',
        //         'users.profile_photo_url as profile_photo_url',
        //         'round_user.round_id as round_id',
        //         'round_user.priority as priority',
        //         'round_user.wishes as wishes',
        //         'rounds.name as round'
        //     )
        //     ->where('users.is_admin', 0)
        //     ->where('rounds.id', $round_id)
        //     ->where('users.name', 'like', '%' . $search . '%')
        //     ->orWhere('users.email', 'like', '%' . $search . '%')
        //     ->where('rounds.id', 'like', $round_id)
        //     ->orderBy('round_user.priority')
        //     ->get();
    }


    static public function running()
    {
        return Round::query()
            ->where('start_date', '<=', Carbon::now()->format('Y-m-d'))
            ->where('end_date', '>=', Carbon::now()->format('Y-m-d'))
            ->get();
    }

    static public function future()
    {
        return Round::query()
            ->where('start_date', '>=', Carbon::now()->format('Y-m-d'))
            ->get();
    }

    static public function passed()
    {
        return Round::query()
            ->where('end_date', '<=', Carbon::now()->format('Y-m-d'))
            ->get();
    }
}
