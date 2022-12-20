<?php

namespace App\Actions\Stockholders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateAction
{
    public function handle(User $user, $name, $email)
    {
        return $user->query()->update([
            'name' => $name,
            'email' => $email,
        ]);
    }
}
