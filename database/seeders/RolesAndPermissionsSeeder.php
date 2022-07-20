<?php

namespace Database\Seeders;

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
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //create Roles
        Role::create(['name' => 'Sin Rol']);
        $role1 = Role::create(['name' => 'Super Admin']);
        $role2 = Role::create(['name' => 'Admin']);
        $role3 = Role::create(['name' => 'Veterinario']);

        // create permissions
        Permission::create(['name' => 'show roles'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'show dates'])->syncRoles($role1, $role2, $role3);
        Permission::create(['name' => 'show users'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'edit user'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'delete user'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'create user'])->syncRoles($role1, $role2);

        Permission::create(['name' => 'show pet'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'create pet'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'edit pet'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'delete pet'])->syncRoles($role1, $role2);

        Permission::create(['name' => 'show services'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'delete service'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'create service'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'edit service'])->syncRoles($role1, $role2);



        // create roles and assign created permissions

        // this can be done as separate statements

    }
}
