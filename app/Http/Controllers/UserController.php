<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        
    //    return response()->json($getUsers);
     
        return view('user.index',compact('getUsers'));
    }

    public function create(Request $request)
    {
        
        return view('auth.register');
    }

  
    public function store(Request $request)
    {   
        
        
        User::create(array_merge($request->only('name','email'),['password'=> Hash::make($request->password)]));

        $getUsers = User::all();
        return view('user.index',compact('getUsers'));
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $getUser = User::find($id);
       
        $getRole = Role::all()->whereNotIn('name',$getUser->getRoleNames());
        $getRoleid = Role::all()->diff($getRole);
        // dd($getRoleid);
        // return response()->json($getRoleid);
        return view('user.edit',compact('getUser','getRole','getRoleid'));
    }

  
    public function update(Request $request,User $user)
    {
        // return $request;
        if (Hash::needsRehash($user->password))
        {
            User::where('id',$user->id)->update(array_merge($request->only('name','email','number'),['password' => Hash::make($request->password)]));
        }else {
            User::where('id',$user->id)->update($request->only('name','email','number'));
           
        }

        $user->syncRoles($request -> role);
        

        if($request->image){

            $getImage = $request->file('image')->store('public/images');
            $url = Storage::url($getImage);

            if($request->user=='create')
            {
                Image::create([
                    'imageable_id' => Auth::id(),
                    'imageable_type' => 'App\Models\User',
                    'url' => $url
                ]);

            }
            else{
            
            Image::where('imageable_id',Auth::id()&&'imageable_type','App\Models\User')->update(
                ['url' => $url
                ]
            );
        } 
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
