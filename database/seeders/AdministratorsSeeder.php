<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class AdministratorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::query()
            ->where('name', 'admin')
            ->get();

        User::create([
            'name' => 'Frank Lauridsen',
            'is_admin' => 1,
            'email' => 'frank@designrus.dk',
            'email_verified_at' => now(),
            'password' => Hash::make('eZzN9KPAnwFTCy'),
            'remember_token' => Str::random(10),
        ])->assignRole($role);
    }
}
