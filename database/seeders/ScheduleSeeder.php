<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $schedule = new Schedule;

        for ($h=9; $h <=16 ; $h++) { 
            for ($m=0; $m <=80 ; $m+=40) { 
              
            $time = Carbon::createFromTime($h,$m);
            $schedule->create([
                'start' => $time,
                'end' => $time->copy()->addMinutes(40),
            ]);
                
            }
        }
        

       

        
        
    }
}
