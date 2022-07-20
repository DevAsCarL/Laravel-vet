<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory()->count(50)
      
        ->create();

        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(CreateServicesSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(CreateUsersSeeder::class);
    }
}
