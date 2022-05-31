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

        User::factory(1)->create([
            'name' => 'Administrator',
            'email' => 'admin@email.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_admin' => 1,
        ]);

        User::factory(1)->create([
            'name' => 'Stockholder',
            'email' => 'stockholder@email.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_admin' => 0,
        ]);
    }
}
