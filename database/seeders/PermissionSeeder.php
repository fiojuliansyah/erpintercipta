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
            'candidate-menu',
            'candidate-list',
            'candidate-create',
            'candidate-edit',
            'candidate-delete',
            'pkwt-menu',
            'pkwt-list',
            'pkwt-create',
            'pkwt-edit',
            'pkwt-delete',
            'job-portal',
            'addendum-menu',
            'addendum-list',
            'addendum-create',
            'addendum-edit',
            'addendum-delete',
            'agreement-menu',
            'agreement-list',
            'agreement-create',
            'agreement-edit',
            'agreement-delete',
            'employee-list',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'site-list',
            'site-create',
            'site-edit',
            'site-delete',
            'warehouse-system',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete'
        ];
       
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}