<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all();
        $users = User::all();



        foreach ($users as $user) {
            $rol = $roles->random(1);
            $user->assignRole($rol);
        }
        
        // User::all()->each(function ($user) use ($roles) {

        //     $user->roles()->attach(
        //         $roles->random(1)->pluck('id')
        //     );
        // });
        
    }
}
