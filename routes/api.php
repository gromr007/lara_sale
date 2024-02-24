<?php

use App\Actions\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('sanctum')->namespace('Api')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('token', [AuthController::class, 'token']);
});


Route::group(['middleware' => 'auth:sanctum'], function () {
    //Route::apiResource('blogs', BlogController::class);
});
