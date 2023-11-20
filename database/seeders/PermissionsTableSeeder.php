<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

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
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'organization-list',
           'organization-create',
           'organization-edit',
           'organization-delete',
           'project-list',
           'project-create',
           'project-edit',
           'project-delete',
           'department-list',
           'department-create',
           'department-edit',
           'department-delete',
           'task-list',
           'task-create',
           'task-edit',
           'task-delete',
           'member-list',
           'member-create',
           'member-edit',
           'member-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'permission-list',
           'permission-create',
           'permission-edit',
           'permission-delete',
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
