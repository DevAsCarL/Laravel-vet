<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Pet;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DatatableController extends Controller
{
    public function users(User $user){

    // $users = $user->select('id','name','number','email')->get();

    $user_roles = $user->with('roles')->select('users.id','users.name','users.number','users.email')->get();
    // return response()->json($user_roles);
    return datatables()->of($user_roles)
    ->addcolumn('btn','user.btns')
    ->rawcolumns(['btn'])
    ->toJson();

}
    
    public function roles(){

        $roles = Role::all();

        return datatables()->of($roles)
        ->addcolumn('btn','role.btns')
        ->rawcolumns(['btn'])
        ->toJson();
    }

    public function pets(){

        $pets = User::with('pets')->select('users.id','users.name')->get();
        
        return datatables()->of($pets)
        ->addcolumn('btn','pet.btns')
        ->rawcolumns(['btn'])
        ->toJson();
    }
    
    public function services(){

        $services = Service::all();

        return datatables()->of($services)
        ->addcolumn('btn','service.btns')
        ->rawcolumns(['btn'])
        ->toJson();
    }

    public function dates(){

        $dates = Date::all();

        return datatables()->of($dates)
        ->addcolumn('btn','date.btns')
        ->rawcolumns(['btn'])
        ->toJson();
    }

   







}


