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
            'name' => 'Round before',
            'end_wishes_date' => '2022-01-01',
            'start_round_date' => '2022-01-10',
            'end_round_date' => '2022-05-01',
        ]);

        Round::factory(1)->create([
            'name' => 'Round current',
            'end_wishes_date' => '2022-07-01',
            'start_round_date' => '2022-07-10',
            'end_round_date' => '2022-11-01',
        ]);

        Round::factory(1)->create([
            'name' => 'Round after',
            'end_wishes_date' => '2023-01-01',
            'start_round_date' => '2023-01-10',
            'end_round_date' => '2023-05-01',
        ]);
    }
}
