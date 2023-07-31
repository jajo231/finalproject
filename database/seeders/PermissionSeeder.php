<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $employee = Role::create(['name' => 'employee']);

        $createUser = Permission::create(['name' => 'create-user']);
        $createEmployee = Permission::create(['name' => 'create-employee']);
        $editEmployee = Permission::create(['name' => 'edit-employee']);
        $viewEmployee = Permission::create(['name' => 'view-employee']);
        $deleteEmployee = Permission::create(['name' => 'delete-employee']);
        $listEmployee = Permission::create(['name' => 'list-employee']);

        $admin->givePermissionTo($createUser);
        $admin->givePermissionTo($createEmployee);
        $admin->givePermissionTo($editEmployee);
        $admin->givePermissionTo($viewEmployee);
        $admin->givePermissionTo($deleteEmployee);
        $admin->givePermissionTo($listEmployee);

        $employee->givePermissionTo($viewEmployee);
    }
}
