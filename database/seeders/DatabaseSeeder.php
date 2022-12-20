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

        User::factory(5)->create(['is_admin' => 1]);
        User::factory(1000)->create();

        Round::factory()->create([
            'name' => 'Passed round 1',
            'stop_wishes_date' => '2021-01-20',
            'start_date' => '2021-02-01',
            'end_date' => '2021-06-01',
        ]);

        Round::factory()->create([
            'name' => 'Passed round 2',
            'stop_wishes_date' => '2022-01-20',
            'start_date' => '2022-02-01',
            'end_date' => '2022-06-01',
        ]);

        Round::factory()->create([
            'name' => 'Current round',
            'stop_wishes_date' => '2022-07-20',
            'start_date' => '2022-08-01',
            'end_date' => '2023-01-07',
        ]);

        Round::factory()->create([
            'name' => 'Future round 1',
            'stop_wishes_date' => '2023-01-20',
            'start_date' => '2023-02-10',
            'end_date' => '2023-07-20',
        ]);

        Round::factory()->create([
            'name' => 'Future round 2',
            'stop_wishes_date' => '2024-01-20',
            'start_date' => '2024-02-10',
            'end_date' => '2024-07-20',
        ]);

        Property::factory(10)->create();

        // foreach (Round::all() as $round) {
        //     $users = User::inRandomOrder()->take(rand(1, 1000))->pluck('id');
        //     foreach ($users as $user) {
        //     $round->users()->attach($user, ['wishes' => rand(1, 20)]);
        //     }
        // }
    }
}
