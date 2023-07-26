<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Developer
        Role::create(['name' => 'developer'])->syncPermissions([
            Permission::all(),
        ]);

        // Administrator
        Role::create(['name' => 'admin'])->syncPermissions([
            Permission::query()
                ->where('name', 'LIKE', '%user%')
                ->orWhere('name', 'LIKE', '%admin%')
                ->orWhere('name', 'LIKE', '%shareholder%')
                ->orWhere('name', 'LIKE', '%user data%')
                ->orWhere('name', 'LIKE', '%company%')
                ->orWhere('name', 'LIKE', '%round%')
                ->orWhere('name', 'LIKE', '%email template%')
                ->get()
        ]);
    }
}
