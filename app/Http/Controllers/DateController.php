<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Pet;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    public function showDate(Request $request)
    {
        if ($request->ajax()) {
            [$date, $time] = explode('T', $request->date);
            [$time,] = explode('-', $time);
            $date = Date::where('user_id', Auth::id())
                ->whereDate('reserved_at', $date)
                ->whereTime('reserved_at', $time)
                ->first();
            $client = User::find($date->client_id);
            $pet = Pet::find($date->pet_id);
            $service = Service::find($date->service_id);
            return [$date, $client,$pet,$service];
        }
        return redirect()->back();
    }


    public function showCalendar()
    {
        return Date::all();
    }



    public function index()
    {
        $reserved = Auth::user()->dates()->get(['reserved_at', 'title'])->toJson();
        // return $reserved;
        return view('date.index', compact('reserved'));
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
        return view('date.create', compact('getServices', 'veterinaryUsers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // return request()->pet_id;
        $request->validate([
            'reserved_at' => 'required|unique:dates,reserved_at',
            'pet_id' => 'required|exists:pets,id,user_id,'.auth()->id(),
            'service_id' => 'numeric|required|exists:services,id',
            'user_id' => 'numeric|required|exists:users,id',
            'description' => 'alpha|required',
            'schedule_id' => 'numeric|required|exists:schedules,id'
        ]);
        
        $time = Schedule::find($request->schedule_id)->start;
        $request->reserved_at = date('Y-m-d H:i:s', strtotime($request->reserved_at . ' ' . $time));
        $data = $request->except('_token', 'reserved_at');
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
    public function show(User $cita, Request $request)
    {
        if ($request->ajax()) {
            $vet = $cita->dates()->whereDate('reserved_at', $request->date)->get();
            $schedule = Schedule::all();
            return [$vet, $schedule];
        }
        return redirect()->back();
    }


    public function destroy(Date $date)
    {
        //
    }
}
