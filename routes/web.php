<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DateController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::view('user', 'user.store');

Route::resource('users',App\Http\Controllers\UserController::class)->middleware('auth');

Route::resource('citas', DateController::class);

Route::middleware('auth')->group(function () {
    
    Route::resource('manage', ManageController::class);
    Route::resource('users',App\Http\Controllers\UserController::class);
    Route::resource('citas', App\Http\Controllers\DateController::class);
    Route::get('/profile',[App\Http\Controllers\UserController::class,'profile'] )->name('profile');
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
