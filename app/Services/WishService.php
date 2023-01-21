<?php

namespace App\Services;

use App\Models\Round;
use App\Models\User;
use App\Models\Wish;

class WishService
{
    public function removeStockholdersWishes($userId)
    {
        $stockholder = User::query()->find($userId);
        $stockholder = $stockholder->rounds()->detach();
    }

    public function checkIfWishIsset($data)
    {
        return Wish::query()
            ->where('round_id',    $data['round_id'])
            ->where('user_id',     $data['stockholder_id'])
            ->where('property_id', $data['property_id'])
            ->where('week_code',   $data['week_code'])
            ->exists();
    }

    public function updateWishStatusById($id, $status)
    {
        $wish = Wish::find($id);
        $wish->update(['status' => $status]);
    }

    public function checkForConfirmedDuplicates($data)
    {
        $confirmed          = $this->getConfirmedWish($data);
        $overlimitConfirmed = $this->getOverlimitConfirmedWish($data);
        if ($confirmed)          return $confirmed;
        if ($overlimitConfirmed) return $overlimitConfirmed;
        return false;
    }

    public function getConfirmedWish($data)
    {
        return Wish::query()
            ->where('round_id',    $data['round_id'])
            ->where('user_id',     $data['stockholder_id'])
            ->where('property_id', $data['property_id'])
            ->where('week_code',   $data['week_code'])
            ->where('status',      $data['confirmed'])
            ->first();
    }

    public function getOverlimitConfirmedWish($data)
    {
        return Wish::query()
            ->where('round_id',    $data['round_id'])
            ->where('user_id',     $data['stockholder_id'])
            ->where('property_id', $data['property_id'])
            ->where('week_code',   $data['week_code'])
            ->where('status',      $data['overlimit_confirmed'])
            ->first();
    }

    public function createWish($data)
    {
        return Wish::query()->create([
            'round_id'    => $data['round_id'],
            'user_id'     => $data['stockholder_id'],
            'property_id' => $data['property_id'],
            'week_code'   => $data['week_code'],
        ]);
    }

    public function getStockholderWishLimit($roundId, $stockholderId)
    {
        $round = Round::find($roundId);
        $stockholder = $round->users()->where('user_id', $stockholderId)->first();
        return $stockholder->pivot->wishes;
    }

    public function getStockholderUsedWishesQty($roundId, $stockholderId)
    {
        return Wish::query()
            ->where('round_id', $roundId)
            ->where('user_id', $stockholderId)
            ->count();
    }
}
