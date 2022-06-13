<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminPrioritiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Priority::create([
            'user_id' => 1,
            'round_id' => 1,
            'priority' => null,
            'available_weeks' => 10
        ]);

        Priority::create([
            'user_id' => 2,
            'round_id' => 1,
            'priority' => null,
            'available_weeks' => 5
        ]);

        Priority::create([
            'user_id' => 3,
            'round_id' => 1,
            'priority' => 1,
            'available_weeks' => 3
        ]);
    }
}
