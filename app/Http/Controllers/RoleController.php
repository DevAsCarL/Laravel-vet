<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{

    public function __construct() {
        $this->middleware('can:show roles');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $permissions = Permission::all();
        return view('role.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $request->validate([
            'name' => 'required',
        ]);

        $newRole = Role::create([
            'name' => $request->name
        ]);
        $newRole->syncPermissions($request->id);
        return redirect()->route('role.index')->withSuccess('Creado correctamente');

    }

    public function edit(Role $role)
    {   

        $allPermissions = Permission::all();
        return view('role.edit',compact('role','allPermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {  
        $request->validate(['permissions' => 'array|between:0,'.Permission::count()]);
        $role->syncPermissions($request->permissions);
        return redirect()->route('role.edit',$role->id)->withSuccess('Actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()->route('role.index')->withSuccess('Eliminado correctamente');
    }
}
