<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Date;
use App\Models\Pet;
use App\Models\Schedule;
use App\Models\Service;
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
        $user = User::create(
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@superadmin.com',
                'number' => '19999999',
                'password' => Hash::make('carlos030898')
            ]
        );
        $user->assignRole('Super Admin');
        Pet::create([
            'user_id' => $user->id,
            'name' => 'Bobi',
            'description' => 'es un perro parecido a un lebrel, pero no pertecene a ninguna raza en concreto. Es probable que sea un perro cazador porque corre como un galgo y sus patas son largas. Es de tamaño mediano y su complexión es delgada.'
        ]);
        $user =  User::create(
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'number' => '29999999',
                'password' => bcrypt('admin@admin.com')
            ]
        );
        $user->assignRole('Admin');
        Pet::create([
            'user_id' => $user->id,
            'name' => 'Tobi',
            'description' => 'es un perro parecido a un lebrel, pero no pertecene a ninguna raza en concreto. Es probable que sea un perro cazador porque corre como un galgo y sus patas son largas. Es de tamaño mediano y su complexión es delgada.'
        ]);

        $user = User::create(
            [
                'name' => 'Veterinario',
                'email' => 'veterinario@vet.com',
                'number' => '39999999',
                'password' => bcrypt('veterinario@vet.com')
            ]
        );
        $user->assignRole('Veterinario');

        $pet = Pet::create([
            'user_id' => $user->id,
            'name' => 'Roob',
            'description' => 'es un perro parecido a un lebrel, pero no pertecene a ninguna raza en concreto. Es probable que sea un perro cazador porque corre como un galgo y sus patas son largas. Es de tamaño mediano y su complexión es delgada.'
        ]);
        $this->faker = Faker::create();

        $date = now()->isoFormat('YYYY-MM-DD');
        for ($i = 0; $i < 10; $i++) {
            $schedule = Schedule::all()->random(1)->first();
            $time = $schedule->start;
            $dateArray = [
                date('Y-m-d H:i:s', strtotime($date . ' ' . $time)),
                date('Y-m-d H:i:s', strtotime(now()->add(1, 'day')->isoFormat('YYYY-MM-DD') . ' ' . $time)),
                date('Y-m-d H:i:s', strtotime(now()->add(1, 'day')->isoFormat('YYYY-MM-DD') . ' ' . $time))
            ];
            Date::create([
                'reserved_at' => $dateArray[array_rand($dateArray, 1)],
                'description' => $this->faker->text(30),
                'client_id' => User::all()->random(1)->first()->id,
                'service_id' => Service::all()->random(1)->first()->id,
                'pet_id' => $pet->id,
                'user_id' => $user->id,
                'schedule_id' => $schedule->id,
                'title' => 'reservado'
            ]);
        }
    }
}
