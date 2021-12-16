<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\EjerciciosController;
use App\Http\Controllers\MarcasController;
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
    return view('home');
})->middleware('auth');

Route::get('/register',[RegisterController::class,'create'])
->middleware('guest')
->name('register.index');

Route::post('/register',[RegisterController::class,'store'])
->name('register.store');



Route::get('/login',[SessionsController::class,'create'])
->middleware('guest')
->name('login.index');


Route::post('/login',[SessionsController::class,'store'])
->name('login.store');

Route::get('/logout',[SessionsController::class,'destroy'])
->middleware('auth')
->name('login.destroy');


/*Route::get('/ejercicios',[EjerciciosController::class,'index'])
->name('ejercicio.index');

Route::get('/ejercicios/create',[EjerciciosController::class,'create'])
->name('ejercicio.create');

Route::post('/ejercicios/store',[EjerciciosController::class,'store'])
->name('ejercicio.store');

Route::delete('ejercicios/destroy', [EjerciciosController::class,'destroy'])->name('ejercicio.destroy');*/

Route::resource('ejercicios', EjerciciosController::class)->middleware('auth');
Route::resource('marcas', MarcasController::class)->middleware('auth');
