<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cache permission dan role
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Membuat role
        Role::create(['name' => 'user']);
        Role::create(['name' => 'penulis']);
        Role::create(['name' => 'admin']);

        // Membuat permission
        Permission::create(['name' => 'create article']);
        Permission::create(['name' => 'edit own article']);
        Permission::create(['name' => 'delete own article']);
        Permission::create(['name' => 'publish article']);
        Permission::create(['name' => 'approve article']);

        $admin = User::find(1);
        $writer = User::where('name' , 'writer')->first();

        $admin->assignRole('admin');
        $writer->assignRole('penulis');

    }
}
