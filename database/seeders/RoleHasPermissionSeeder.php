<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin_permission = Permission::all();
        Role::findOrFail(1)->permissions()->sync($superadmin_permission->pluck('id'));

        $admin_permission = Permission::all();
        Role::findOrFail(2)->permissions()->sync($admin_permission->pluck('id'));

        $lider_permission = Permission::all()->only([11,12,13,14,15,16,18]);
        Role::findOrFail(3)->permissions()->sync($lider_permission->pluck('id'));

        $tecnico_permission = Permission::all()->only([14,15]);
        Role::findOrFail(4)->permissions()->sync($tecnico_permission->pluck('id'));

        $cliente_permission = Permission::all()->only([7,8,11,20,22,23,24]);
        Role::findOrFail(5)->permissions()->sync($cliente_permission->pluck('id'));

        $becario_permission = Permission::all()->only([14,15]);
        Role::findOrFail(5)->permissions()->sync($becario_permission->pluck('id'));

    }
  
}
