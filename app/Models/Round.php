<?php

namespace App\Models;

use App\Http\Livewire\App\WishesTable;
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
        'start_wishes_date',
        'stop_wishes_date',
        'start_date',
        'end_date',
        'max_wishes',
        'description',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot(['wishes', 'priority']);
    }
}
