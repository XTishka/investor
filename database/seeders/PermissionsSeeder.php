<?php

namespace Database\Seeders;

use App\Enums\PermissionGroups;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $groups  = PermissionGroups::getKeysValues();
        $actions = ['create', 'read', 'update', 'delete'];

        // Misc
        Permission::create(['name' => 'N/A']);

        foreach ($groups as $key => $name) :
            foreach ($actions as $action) :
                Permission::create(['name' => $action . ': ' . $key]);
            endforeach;
        endforeach;
    }
}
