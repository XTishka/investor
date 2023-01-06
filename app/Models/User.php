<?php

namespace App\Models;

use App\Http\Livewire\App\WishesTable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function rounds()
    {
        return $this->belongsToMany(Round::class)->withPivot(['wishes', 'priority']);
    }

    public function wishes()
    {
        return $this->hasMany(Wish::class);
    }

    public function searchAllStockholders($search, $perPage)
    {
        return  $this->query()
            ->where('is_admin', 0)
            ->where(
                fn ($query) => $query
                    ->orWhere('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
            )
            ->paginate($perPage);
    }

    public function searchRoundStockholders($roundId, $search, $perPage)
    {
        $round = Round::query()->find($roundId);
        return $round->users()
            ->where('is_admin', '!=', 1)
            ->where(
                fn ($query) => $query
                    ->orWhere('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
            )
            ->paginate($perPage);
    }
}
