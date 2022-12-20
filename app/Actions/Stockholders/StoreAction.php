<?php

namespace App\Actions\Stockholders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreAction
{
    public function handle($name, $email, $password)
    {
        return User::factory()->create([
            'name'      => $name,
            'email'     => $email,
            'password'  => Hash::make($password),
            'is_admin'  => 0,
        ]);
    }
}