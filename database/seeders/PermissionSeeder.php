<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions
        $permissions = [
            'status',
            'admin-only',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'crud-list',
            'crud-create',
            'crud-edit',
            'crud-delete',
            'company-list',
            'company-create',
            'company-edit',
            'company-delete',
            'taxcategory-list',
            'taxcategory-create',
            'taxcategory-edit',
            'taxcategory-delete',
            'accounttype-list',
            'accounttype-create',
            'accounttype-edit',
            'accounttype-delete',
            'term-list',
            'term-create',
            'term-edit',
            'term-delete',
            'project-list',
            'project-create',
            'project-edit',
            'project-delete',
            'customer-list',
            'customer-create',
            'customer-edit',
            'customer-delete',
            'department-list',
            'department-create',
            'department-edit',
            'department-delete',
            'chartofaccount-list',
            'chartofaccount-create',
            'chartofaccount-edit',
            'chartofaccount-delete',
            'vendor-list',
            'vendor-create',
            'vendor-edit',
            'vendor-delete',
            'career-list',
            'career-create',
            'career-edit',
            'career-delete',
        ];
       
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}