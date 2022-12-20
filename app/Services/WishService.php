<?php

namespace App\Services;

use App\Models\Round;
use App\Models\User;

class WishService
{
    public function removeStockholdersWishes($userId)
    {
        $stockholder = User::query()->find($userId);
        $stockholder = $stockholder->rounds()->detach();
    }
}
