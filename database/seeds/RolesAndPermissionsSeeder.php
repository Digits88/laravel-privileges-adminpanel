<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'browse permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'add permissions']);
        Permission::create(['name' => 'edit permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'browse roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'add roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'browse users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'add users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        // create roles and assign existing permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('browse permissions');
        $role->givePermissionTo('view permissions');
        $role->givePermissionTo('add permissions');
        $role->givePermissionTo('edit permissions');
        $role->givePermissionTo('delete permissions');
        $role->givePermissionTo('browse roles');
        $role->givePermissionTo('view roles');
        $role->givePermissionTo('add roles');
        $role->givePermissionTo('edit roles');
        $role->givePermissionTo('delete roles');
        $role->givePermissionTo('browse users');
        $role->givePermissionTo('view users');
        $role->givePermissionTo('add users');
        $role->givePermissionTo('edit users');
        $role->givePermissionTo('delete users');
    }
}
