<?php

use App\Actions\Auth\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//GET LOGOUT
    Route::get('logout', [LoginController::class, 'logout'])->name('logoutGet');

//Витрина
    Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware([
    'auth:sanctum',
    'verified'
])->group(function () {

    //Корзина
        Route::get('/cart', [SaleController::class, 'cart'])->name('cart');
    //Прием заказа
        Route::get('/checkout', [SaleController::class, 'storeCheckout'])->name('store_checkout');
    //Удаление заказа
        Route::post('/checkout/delete', [SaleController::class, 'deleteCheckout'])->name('delete_checkout');
    //Страница завершения заказа
        Route::get('/confirm/{order?}', [SaleController::class, 'confirmOrder'])->name('confirm_order');
    //Личный кабинет
        Route::get('/account', [AccountController::class, 'index'])->name('account');
    //Корзина Прием
        Route::post('/cart/increment', [SaleController::class, 'changePosCart'])->name('cart_increment');
        Route::post('/cart/decrement', [SaleController::class, 'changePosCart'])->name('cart_decrement');
        Route::post('/cart/add', [SaleController::class, 'changePosCart'])->name('cart_add');
        Route::post('/cart/delete', [SaleController::class, 'deletePos'])->name('position_delete');
        Route::get('/cart/clear', [SaleController::class, 'clearCart'])->name('cart_clear');

});
