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

            'user-menu',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-menu',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'crud-menu',
            'crud-list',
            'crud-create',
            'crud-edit',
            'crud-delete',
            'company-menu',
            'company-list',
            'company-create',
            'company-edit',
            'company-delete',
            'taxcategory-menu',
            'taxcategory-list',
            'taxcategory-create',
            'taxcategory-edit',
            'taxcategory-delete',
            'accounttype-menu',
            'accounttype-list',
            'accounttype-create',
            'accounttype-edit',
            'accounttype-delete',
            'term-menu',
            'term-list',
            'term-create',
            'term-edit',
            'term-delete',
            'project-menu',
            'project-list',
            'project-create',
            'project-edit',
            'project-delete',
            'customer-menu',
            'customer-list',
            'customer-create',
            'customer-edit',
            'customer-delete',
            'department-menu',
            'department-list',
            'department-create',
            'department-edit',
            'department-delete',
            'chartofaccount-menu',
            'chartofaccount-list',
            'chartofaccount-create',
            'chartofaccount-edit',
            'chartofaccount-delete',
            'vendor-menu',
            'vendor-list',
            'vendor-create',
            'vendor-edit',
            'vendor-delete',
            'career-menu',
            'career-list',
            'career-create',
            'career-edit',
            'career-delete',
            'applicant-menu',
            'applicant-list',
            'applicant-create',
            'applicant-edit',
            'applicant-delete',
            'job-portal',
        ];
       
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}