<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\Round;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Takhir Berdyiev',
            'email' => 'takhir.berdyiev@gmail.com',
            'password' => Hash::make('3141592654XTf'),
            'is_admin' => 1,
        ]);

        User::factory(10)->create(['is_admin' => 1]);
        Round::factory(10)->create();
        Property::factory(10)->create();
    }
}