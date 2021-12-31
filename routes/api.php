<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
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

Route::apiResource('users',UserController::class);
// to get the user image
Route::get('/userImage/{user}', function (User $user) {
    return $user->image;
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

