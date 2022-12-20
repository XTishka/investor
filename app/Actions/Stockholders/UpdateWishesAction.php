<?php

namespace App\Actions\Stockholders;

use App\Models\Round;
use App\Models\User;
use App\Services\WishService;
use Exception;

class UpdateWishesAction
{
    public $result = true;
    public $wishService;

    public function __construct()
    {
        $this->wishService = new WishService;
    }

    public function handle($userId, $rounds)
    {
        try {
            foreach ($rounds as $roundId => $wishes) {
                if (!is_array($wishes)) {
                    $stockholder = User::query()->find($userId);
                    if (!empty($wishes)) {
                        if ($stockholder->rounds()->where('round_id', $roundId)->exists()) {
                            $stockholder->rounds()->updateExistingPivot($roundId, ['wishes' => $wishes]);
                        } else {
                            $stockholder->rounds()->attach($roundId, ['wishes' => $wishes]);
                        }
                    } else {
                        $stockholder->rounds()->detach($roundId);
                    }
                }
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
