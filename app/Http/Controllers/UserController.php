<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModifyUserRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('can:create user')->only('create');
    }
    public function index()
    {
        return view('user.index');
    }

    public function create(Request $request)
    {
        
        return view('auth.register');
    }

    public function show(User $user)
    {   
        $getRoles = Role::all();
        return view('user.edit',compact('getRoles','user'));
    }

    public function edit(ModifyUserRequest $request,User $user)
    {
        $user->update($request->validated());
        $user->syncRoles($request -> role);
        return redirect()->route('users.index')->withSuccess('Actualizado correctamente');
    }

  
    public function update(UpdateUserRequest $request,User $user)
    {   
        $user->update($request->validated());

        if($request->image){
            $setImage = $request->file('image')->store('/public/images');
            $url = Storage::url($setImage);
            
            $image = Image::updateOrCreate([
                'imageable_id' => $user->id,
                'imageable_type' => 'App\Models\User',
            ], [
                'url' => $url,
            ]);
        }
            return redirect()->back()->withSuccess('Actualizado correctamente');  
        

        
    }

    
    public function destroy($id)
    {
        
        User::destroy($id);

        $getUsers = User::all();
        return view('user.index',compact('getUsers'));
    }

    public function updatePassword(PasswordRequest $request,User $user){

        $user->update(['password' => bcrypt($request->password)]);

        return back()->withSuccess('Actualizado correctamente');
    }

}
