<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

// Buat permissions
        Permission::create(['name' => 'create articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'approve articles']);

// Buat roles dan assign permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('create articles');
        $role->givePermissionTo('publish articles');
        $role->givePermissionTo('approve articles');

        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo('create articles');

        $role = Role::create(['name' => 'user']);
// User role tidak memerlukan permission khusus

    }
}
