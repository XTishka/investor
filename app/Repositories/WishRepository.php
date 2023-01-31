<?php

namespace App\Repositories;

use App\Models\Wish;
use App\Interfaces\WishRepositoryInterface;

class WishRepository implements WishRepositoryInterface
{
    public function getUsersWishesInRound($roundId, $userId)
    {
        return Wish::query()
            ->where('round_id', $roundId)
            ->where('user_id', $userId)
            ->count();
    }

    public function createWishWithArray($data)
    {
        return Wish::query()->create([
            'user_id'       => $data['user_id'],
            'round_id'      => $data['round_id'],
            'property_id'   => $data['property_id'],
            'week_code'     => $data['week_code'],
            'priority'      => $data['priority'],
        ]);
    }

    public function wishExists($data)
    {
        return Wish::query()
            ->where('user_id',     $data['user_id'])
            ->where('round_id',    $data['round_id'])
            ->where('property_id', $data['property_id'])
            ->where('week_code',   $data['week_code'])
            ->exists();
    }
}
