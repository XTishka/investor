<?php

namespace Database\Seeders;

use App\Models\Round;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoundsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Round::query()->create([
            'name' => 'Prioriteringsrunde Sommer 2023',
            'description' => 'lorem ipsum some description',
            'wishes_start_date' => '2023-01-24',
            'wishes_end_date' => '2023-01-30',
            'start_date' => '2023-04-15',
            'end_date'  => '2023-09-21',
            'max_wishes' => 20,
            'overlimit' => 1,
            'active' => 0,
        ]);

        Round::factory(5)->create();
    }
}
