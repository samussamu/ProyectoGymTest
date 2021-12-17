<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\EjerciciosController;
use App\Http\Controllers\MarcasController;
use App\Mail\WelcomeMailable;
use Illuminate\Support\Facades\Mail;
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



Route::resource('ejercicios', EjerciciosController::class)->middleware('auth');
Route::resource('marcas', MarcasController::class)->middleware('auth');

Route::get('contactanos',function(){
    $mail = new WelcomeMailable;

    Mail::to('samutt90@gmail.com')->send($mail);
});
