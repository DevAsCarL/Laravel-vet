<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class CreateServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create(
            ['name'=>'Peluqueria',
            'description'=>'Peluqueria para mascotas',
            'status'=>'A'
        ]);
        Service::create(
            ['name'=>'Baño y Limpieza',
            'description'=>'Baño y Limpieza para mascotas',
            'status'=>'A'
        ]);
        Service::create(
            ['name'=>'Cirugía',
            'description'=>'Cirugía para mascotas',
            'status'=>'A'
        ]);
        Service::create(
            ['name'=>'Chequeo Medico',
            'description'=>'Chequeo Medico para mascotas',
            'status'=>'A'
        ]);
    }
}
