<?php

namespace App\Interfaces;

interface WishRepositoryInterface
{
    public function getUsersWishesInRound($roundId, $userId);
    public function createWishWithArray($data);
    public function wishExists($data);
}
