<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\User;
use Facade\FlareClient\Http\Response;
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
    public function index()
    {
        $events = Date::all('reserved_at','title'); 
        // return $events;  
        // return response()->json($events, 200 );
        return $events;
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {          
        $veterinaryUsers = User::role('Veterinario')->get();
        $getServices = Service::all();       
        return view('date.create',compact('getServices','veterinaryUsers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $time = Schedule::find($request->schedule_id)->start;
        $request->reserved_at = date('Y-m-d H:i:s',strtotime($request->reserved_at.' '.$time));
        $data = $request->except('_token','reserved_at');
        $data['reserved_at'] = $request->reserved_at;
        $data['title'] = 'reservado';
        $data['client_id'] = Auth::id();
        Date::create($data);
        return redirect()->route('citas.create')->withSuccess('Reservado con exito');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function show(User $cita,Request $request)
    {
        $vet = $cita->dates()->whereDate('reserved_at',$request->date)->get();
        $schedule = Schedule::all();
        return [$vet,$schedule];
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
