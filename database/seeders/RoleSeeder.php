<?php

namespace Database\Seeders;

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
    //    $role1 =  Role::create(['name'=>'Admin']);

    //    Permission::create(['name'=>'users.create'])->assignRole($role1);



    
    //   $user = \App\Models\User::create([
    //          'name' => 'admin',
    //          'email' => 'admin@admin.com',
    //          'password'=>bcrypt('admin123')
    //     ]);
    // $user->assignRole($role1);

        $roles = [
            'Super Admin',
            'Admin',
            'Lider de proyecto',
            'Tecnico',
            'Cliente',
            'Becario'
        ];

        foreach($roles as $role){
            Role::create([
                'name' => $role
            ]);
        }

    }
}
