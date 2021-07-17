<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'access_roles_permissions',
            'create_roles_permissions',
            'edit_roles_permissions',
            'delete_roles_permissions',
            'access_products',
            'create_products',
            'show_products',
            'edit_products',
            'delete_products',
            'access_product_categories',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        //Assign all the permissions to Admin role
        $role = Role::create([
            'name' => 'Admin'
        ]);

        $role->givePermissionTo($permissions);
    }
}