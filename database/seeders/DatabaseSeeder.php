<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Property;
use Database\Seeders\StockholderPrioritiesSeeder;

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

            // Fake starter
            RoundStartSeeder::class,
            // StockholderSeeder::class,
            // StockholderPrioritiesSeeder::class,
        ]);

        // Fake data generators
        Property::factory(50)->create();
    }
}
