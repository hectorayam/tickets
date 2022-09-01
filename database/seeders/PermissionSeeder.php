<?php

namespace Database\Seeders;

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
        $permissions = [
            'user',
            'user.index',
            'user.create',
            'user.show',
            'user.edit',
            'user.destroy',

            'project.menu',
            'cotizar',
            'project.index',
            'project.create',
            'project.show',
            'project.edit',
            'project.destroy',
             
            'task.menu',
            'task.index',
            'task.create',
            'task.show',
            'task.edit',
            'task.destroy',
            
            'report.menu',
            'report.index',
            'report.create',
            'report.show',
            'report.edit',
            'report.destroy',

            'status.index',
            'status.create',
            'status.show',
            'status.edit',
            'status.destroy',

            'permission.index',
            'permission.create',
            'permission.show',
            'permission.edit',
            'permission.destroy',

            'rol.index',
            'rol.create',
            'rol.show',
            'rol.edit',
            'rol.destroy',


            'company.index',
            'company.create',
            'company.show',
            'company.edit',
            'company.destroy'
        ];

        foreach($permissions as $permission){
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
