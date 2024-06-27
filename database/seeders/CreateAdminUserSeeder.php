<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the user
        $user = User::create([
            'nik_number' => '3216212807990003',
            'name' => 'Super Admin', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);

        // Create Admin role and assign all permissions to it
        $adminRole = Role::create(['name' => 'Admin']);
        $allPermissions = Permission::pluck('id', 'id')->all();
        $adminRole->syncPermissions($allPermissions);

        // Create Employee role and assign only the employee-list permission to it
        $employeeRole = Role::create(['name' => 'employee']);
        $employeePermission = Permission::where('name', 'employee-list')->first();
        if ($employeePermission) {
            $employeeRole->syncPermissions([$employeePermission->id]);
        }
        
        // Assign both roles to the user
        $user->assignRole([$adminRole->id, $employeeRole->id]);
    }

}