<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::factory(1)->create([
            'name' => 'Confirmed',
            'description' => 'Confirmed distribution'
        ]);

        Status::factory(1)->create([
            'name' => 'Not confirmed',
            'description' => 'Not confirmed distribution'
        ]);

        Status::factory(1)->create([
            'name' => 'Failed',
            'description' => 'Failed distribution'
        ]);
    }
}
