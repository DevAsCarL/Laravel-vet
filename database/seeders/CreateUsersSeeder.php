<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            ['name'=>'Carlos',
            'email'=>'carloscarbajalrojas@hotmail.com',
            'number'=>'19999999',
            'password'=>Hash::make('12345678')]);
        User::create(
            ['name'=>'Manuel',
            'email'=>'carlos@hotmail.com',
            'number'=>'29999999',
            'password'=>bcrypt('12345678')]);
        User::create(
            ['name'=>'Franco',
            'email'=>'carbajal@hotmail.com',
            'number'=>'39999999',
            'password'=>bcrypt('12345678')]);
        User::create(
            ['name'=>'Alessandro',
            'email'=>'rojas@hotmail.com',
            'number'=>'49999999',
            'password'=>bcrypt('12345678')]);
        User::create(
            ['name'=>'Prueba',
            'email'=>'carlos@example.com',
            'number'=>'59999999',
            'password'=>bcrypt('12345678')]);
        

            
    }
}
