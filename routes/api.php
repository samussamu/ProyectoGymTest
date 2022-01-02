<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ApiMarcasController;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//public routes

Route::get('/users/search/{email}',[UserController::class,'search']);
Route::get('/users',[UserController::class,'index']);
Route::get('/users/{user}',[UserController::class,'show']);
Route::get('/userImage/{user}', function (User $user) { return $user->image;});

Route::get('/marks',[ApiMarcasController::class,'index']);
Route::get('/marks/{marca}',[ApiMarcasController::class,'show']);

Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);


//protecec routes


Route::group(['middleware'=>['auth:sanctum']], function () {

    Route::get('/marks',[ApiMarcasController::class,'index']);

   Route::post('/logout',[UserController::class,'logout']);

   Route::put('/users/{user}',[UserController::class,'update']);
   Route::delete('/users/{user}',[UserController::class,'destroy']);

   Route::put('/marks/{mark}',[ApiMarcasController::class,'update']);
   Route::delete('/marks/{mark}',[ApiMarcasController::class,'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

