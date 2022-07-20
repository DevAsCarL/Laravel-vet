<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Pet;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = count(User::all());
        $pets = count(Pet::all());
        $roles = count(Role::all());
        $services = count(Service::all());
        $dates = count(Date::all());

        return view('manage.index',compact('users','pets','roles','services','dates'));
    }

}
