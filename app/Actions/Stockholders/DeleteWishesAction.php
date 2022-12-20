<?php

namespace App\Actions\Stockholders;

use App\Models\Round;
use App\Models\User;
use App\Services\WishService;
use Exception;

class DeleteWishesAction
{
    public $result = true;
    public $wishService;

    public function __construct()
    {
        $this->wishService = new WishService;
    }

    public function handle($userId, $roundId)
    {
        try {
            $stockholder = User::query()->find($userId);
            $stockholder->rounds()->detach($roundId);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
