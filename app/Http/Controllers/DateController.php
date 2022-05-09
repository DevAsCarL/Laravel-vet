<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request = Schedule::all();
        // return response()->json($request);
        return response(json_encode($request),200);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()


    {  
        //  $time = Carbon::createFromTime(15,0,0);
        // return $time;
        $getServices = Service::all();
        $getPets = User::find(Auth::id())->pets;
        $day = Carbon::today();
        $day1 = $day->isoFormat('dddd DD');
        $day2 = $day->addDays(1)->isoformat('dddd DD');
        $day3 = $day->addDays(1)->isoFormat('dddd DD');
        return view('date.create',compact('getServices','getPets','day1','day2','day3'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
        // $request->validate([
        //     'mascota' => 'required',
        //     'hour' => 'required|time',
        // ]);

        Date::create([
            'service' => $request->servicio,
            'date' => $request->fecha
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function show(Date $date)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function edit(Date $date)
    {   
        $data = "Hola";
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Date $date)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function destroy(Date $date)
    {
        //
    }
}
