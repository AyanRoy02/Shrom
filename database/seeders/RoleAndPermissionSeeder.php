<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create-category']);
        Permission::create(['name' => 'view-category']);
        Permission::create(['name' => 'edit-category']);
        Permission::create(['name' => 'delete-category']);

        Permission::create(['name' => 'create-jobpost']);
        Permission::create(['name' => 'view-jobpost']);
        Permission::create(['name' => 'edit-jobpost']);
        Permission::create(['name' => 'delete-jobpost']);
        Permission::create(['name' => 'all-pages']);
        Permission::create(['name' => 'create-pages']);
        Permission::create(['name' => 'view-pages']);
        Permission::create(['name' => 'edit-pages']);
        Permission::create(['name' => 'delete-pages']);

        Permission::create(['name' => 'all-users']);
        Permission::create(['name' => 'all-workers']);
        Permission::create(['name' => 'subscribers']);
        Permission::create(['name' => 'website-setup']);
        Permission::create(['name' => 'slider']);
        Permission::create(['name' => 'orders']);


        $workerRole = Role::create(['name' => 'Worker']);
        $adminRole = Role::create(['name' => 'Admin']);

        $adminRole->givePermissionTo([
            'create-category',
            'view-category',
            'edit-category',
            'delete-category',
            'create-jobpost',
            'view-jobpost',
            'edit-jobpost',
            'delete-jobpost',
            'all-users',
            'all-workers',
            'subscribers',
            'create-pages',
            'view-pages',
            'edit-pages',
            'delete-pages',
            'all-pages',
            'website-setup',
            'slider',
            'orders',
            ]);

        $workerRole->givePermissionTo([
            'create-category',
            'view-category',
            'edit-category',
            'delete-category',
            'create-jobpost',
            'view-jobpost',
            'edit-jobpost',
            'delete-jobpost',

        ]);
    }
}
