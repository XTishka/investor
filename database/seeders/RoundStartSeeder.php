<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Round;
use App\Actions\GenerateRoundWeeksAction;

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
            'start_round_date' => '2022-04-16',
            'end_wishes_date' => '2022-11-10',
            'end_round_date' => '2022-11-20',
        ]);

        Round::factory(1)->create([
            'name' => 'Round 2',
            'start_round_date' => '2023-01-01',
            'end_wishes_date' => '2023-05-20',
            'end_round_date' => '2023-06-01',
        ]);
    }
}
