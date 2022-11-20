<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'consultant']);

				Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);

				Permission::create(['name' => 'admin.companies.index'])->syncRoles([$role1, $role2]);
				Permission::create(['name' => 'admin.companies.show'])->syncRoles([$role1, $role2]);
				Permission::create(['name' => 'admin.companies.create'])->assignRole($role1);
				Permission::create(['name' => 'admin.companies.edit'])->syncRoles([$role1, $role2]);
				Permission::create(['name' => 'admin.companies.destroy'])->assignRole($role1);
				Permission::create(['name' => 'admin.employees.index'])->syncRoles([$role1, $role2]);
				Permission::create(['name' => 'admin.employees.show'])->syncRoles([$role1, $role2]);
				Permission::create(['name' => 'admin.employees.create'])->assignRole($role1);
				Permission::create(['name' => 'admin.employees.edit'])->syncRoles([$role1, $role2]);
				Permission::create(['name' => 'admin.employees.destroy'])->assignRole($role1);


    }
}
