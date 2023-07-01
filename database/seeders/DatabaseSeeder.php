<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Round;
use Database\Seeders\RoundsSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([

            // Productions
            PermissionsSeeder::class,
            RolesSeeder::class,
            DevelopersSeeder::class,
            AdministratorsSeeder::class,
            RoundsSeeder::class,
        ]);
    }
}
