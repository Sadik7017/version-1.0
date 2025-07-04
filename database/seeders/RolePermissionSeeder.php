<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // List of permissions
        $permissions = [
            'view users', 'create users', 'edit users', 'delete users',
            'view roles', 'create roles', 'edit roles', 'delete roles',
            'view customers', 'create customers', 'edit customers', 'delete customers',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $manager = Role::firstOrCreate(['name' => 'Manager']);
        $customer = Role::firstOrCreate(['name' => 'Customer']);

        // Assign permissions
        $admin->syncPermissions(Permission::all());

        $manager->syncPermissions([
            'view users', 'edit users',
            'view customers', 'edit customers',
        ]);

        $customer->syncPermissions([
            'view customers'
        ]);
    }
}
