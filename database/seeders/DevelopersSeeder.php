<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
class DevelopersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::query()
            ->where('name', 'developer')
            ->get();

        User::create([
            'name' => 'Takhir Berdyiev',
            'is_admin' => 1,
            'email' => 'takhir.berdyiev@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$8dRZj4M3l.E6/RjgBO/aT.S0c2zFooFvuyU6rueclJIwhdlhNlJlC',
            'remember_token' => Str::random(10),
        ])->assignRole($role);
    }
}
