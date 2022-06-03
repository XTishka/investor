<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Property;
use Database\Seeders\AdminPrioritiesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            RoundStartSeeder::class,
            AdminPrioritiesSeeder::class,
        ]);

        User::factory(1)->create();
        Property::factory(50)->create();
    }
}
