<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create([
            'name' => 'Takhir Berdyiev',
            'email' => 'takhir.berdyiev@gmail.com',
            'password' => '$2y$10$Hbzgmb3jlAQzo4MJ0DLcgujENtEm5iHlWiIW0/lvm.XWOSNKpTJJK',
            'is_admin' => 1,
        ]);


    }
}
