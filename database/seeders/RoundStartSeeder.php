<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Round;

class RoundStartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Round::factory(1)->create([
            'name' => 'Round 1',
            'start_round_date' => '2022-05-16',
            'end_wishes_date' => '2022-10-16',
            'end_round_date' => '2022-11-16',
        ]);
    }
}
