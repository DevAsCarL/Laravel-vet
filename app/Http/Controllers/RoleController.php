<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{

    
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

        Role::create([
            'name' => $request->name
        ]);
        $role = Role::findbyName($request->name);
    
        $role->syncPermissions($request->id);
       
        $permissions = Permission::all();
        return view('role.index',compact('permissions'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {   $allPermissions = Permission::all();
        $rolePermissions = $role->getAllPermissions();
        $noPermissions = $allPermissions->diff($rolePermissions);

        foreach ($rolePermissions as $rolePermission){
           Arr::add($rolePermission,'checkbox','checked');
        }

        $allPermissions = $rolePermissions->concat($noPermissions);

        $allPermissions = $allPermissions->sort();
        

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
        $role->syncPermissions($request->permissions);
        $allPermissions = Permission::all();
        $rolePermissions = $role->getAllPermissions();
        $noPermissions = $allPermissions->diff($rolePermissions);

        foreach ($rolePermissions as $rolePermission){
           Arr::add($rolePermission,'checkbox','checked');
        }

        $allPermissions = $rolePermissions->concat($noPermissions);
        $allPermissions->sort();
       
        return view('role.edit',compact('role','allPermissions'));

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
        $permissions = Permission::all();
        return view('role.index',compact('permissions'));
    }
}
