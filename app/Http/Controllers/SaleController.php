<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SaleController extends Controller
{

    /**
     * Страница корзины
     * */
    public function cart(){

        return view('cart')
            ->with('title', 'Корзина')
            ->with('nameRoute', 'cart');
    }


    /**
     * Добавляет,
     * Инкрементирует,
     * Декрементирует количество товара в позиции
     * */
    public function changePosCart(Request $request) {

        $masRequest = $request->all();

        return redirect()->back();

    }


    /**
     * Удаляет позицию товара из корзины
     * */
    public function deletePos(Request $request) {

        $masRequest = $request->all();

        return redirect()->back();

    }


    /**
     * Полная очистка корзины
     * */
    public function clearCart(Request $request) {

        $masRequest = $request->all();

        return redirect()->back();

    }


    /**
     * Страница создания заказа
     */
    public function storeCheckout()
    {
        return redirect()->route('confirm_order');
    }


    /*
     * Страница завершения заказа
     * */
    public function confirmOrder($order='')
    {
        $nameRoute = 'confirmOrder';

        return view('confirm_order')
            ->with('title', 'Завершение заказа')
            ->with('nameRoute',$nameRoute);

    }



}
