<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModifyUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    public function __construct(){
        $this->middleware('can:create user')->only('create');
    }
    public function index()
    {
        $getUsers = User::all();
        return view('user.index',compact('getUsers'));
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
        User::where('id',$user->id)->update($request->except('_token','role'));

        return redirect()->route('users.index');
    }

  
    public function update(UpdateUserRequest $request,User $user)
    {   
        User::where('id',$user->id)->update($request->validated());

        $user->syncRoles($request -> role);
        

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
        

        $user->assignRole($request -> role);

        $getUsers = User::all();
        
        if($request->profile == '1'){
            return redirect()->route('profile');   
        }
        
        return view('user.index',compact('getUsers'));    
        
    }

    
    public function destroy($id)
    {
        
        User::destroy($id);

        $getUsers = User::all();
        return view('user.index',compact('getUsers'));
    }


    public function profile(Request $request){

        // $getPetImage = User::find(Auth::id())->pets;
        // foreach($getPetImage as $Pet){
        //     return $Pet->image->url;
        // }
        
        
        $getId = Auth::id();

        $getUser = User::find($getId);
        $getPet =null;
        $getImage =null;
        $getPetImage =null;
        if(isset(User::find($getId)->image->url)){
             $getImage = User::find($getId)->image->url;
            
            }

        if(isset(User::find($getId)->pets)){
            $getPet = User::find($getId)->pets;
            
            }


        return view('user.profile',compact('getUser','getPet','getImage','getPetImage'));
    }
}
