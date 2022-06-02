<?php
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DateController;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main');
});

Auth::routes();

Route::view('user', 'user.store');

Route::resource('citas', DateController::class);

Route::middleware('auth')->group(function () {
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('users',App\Http\Controllers\UserController::class);
    
    Route::resource('manage', ManageController::class);
    Route::resource('users',App\Http\Controllers\UserController::class);
    Route::resource('citas', App\Http\Controllers\DateController::class);
    Route::view('profile', 'user.profile')->name('profile');
    Route::resource('pets',PetController::class);
    Route::resource('image',ImageController::class);
    Route::resource('role',RoleController::class);
    Route::resource('service',ServiceController::class);
    //index datatables
    Route::get('Datatable/users',[DatatableController::class,'users'])->name('datatable.users');
    Route::get('Datatable/roles',[DatatableController::class,'roles'])->name('datatable.roles');
    Route::get('Datatable/pets',[DatatableController::class,'pets'])->name('datatable.pets');
    Route::get('Datatable/services',[DatatableController::class,'services'])->name('datatable.services');
    Route::get('Datatable/dates',[DatatableController::class,'dates'])->name('datatable.dates');
   
    //modales datatables
    Route::get('Datatable/pet',[DatatableController::class,'pet'])->name('datatable.pet');
});


//GOOGLE OAuth
Route::get('/auth-google', function () {
    return Socialite::driver('google')->redirect();
});
 
Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->user();
    // $user->token
    $userNew = User::updateOrCreate([
        'external_id' => $user->id,
    ], [
        'name' => $user->name,
        'email' => $user->email,
        'external_auth' => 'google',
    ]);
    
    // dd($userNew->id);
    Image::updateOrCreate([
        'imageable_id' => $userNew->id,
        'imageable_type' => 'App\Models\User'
    ], [
        'url' => $user->avatar,
    ]);

    Auth::login($userNew); 
    return redirect('/home');

});


Route::get('/auth-facebook', function () {
    return Socialite::driver('facebook')->redirect();
});
 
Route::get('/facebook-callback', function () {
    $user = Socialite::driver('facebook')->user();
    // dd($user);
    // $user->token
    $userNew = User::updateOrCreate([
        'external_id' => $user->id,
    ], [
        'name' => $user->name,
        'email' => $user->email,
        'external_auth' => 'facebook',
    ]);
    Image::updateOrCreate([
        'imageable_id' => $userNew->id,
        'imageable_type' => 'App\Models\User'
    ], [
        'url' => $user->avatar,
    ]);
    Auth::login($userNew); 
    return redirect('/home');

});