<?php

use App\Actions\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


//GET LOGOUT
Route::get('logout', [LoginController::class, 'logout'])->name('logoutGet');


Route::middleware([
    'auth:sanctum',
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return 'Личный кабинет';
    });

});
