<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{   
    /** 
    *@return void 
    */
    public function run()
    {
        

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password'=>bcrypt('admin123'),
            'telefono'=>'1234567890'
        ]);
        $user->assignRole('Super Admin');

        
    }
}