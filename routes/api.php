<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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
Route::group(['prefix' => 'v1'], function(){

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:api')->group(function(){

        Route::get('/user', [AuthController::class, 'me']);

        //Route::apiResource('users', UserController::class)->middleware('auth:api')->only(['update', 'destroy']);
        Route::put('user', [UserController::class, 'update']);
        Route::delete('user', [UserController::class, 'destroy']);

    });
//user authentication
});

