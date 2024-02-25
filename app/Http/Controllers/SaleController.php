<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Services\Basket\Basket;
use App\Services\Orders\Orders;
use Illuminate\Http\Request;


class SaleController extends Controller
{

    /**
     * Страница корзины
     * */
    public function cart(ProductRepository $repository, Basket $basket)
    {

        //Берем количество по позициям в корзине
        $quantities = $basket->getPosArr();

        if(!$quantities) {
            return redirect()->route('home');
        }

        //Массив Id товаров в корзине
        $ids = $basket->getPosIds();

        //Берем продукты корзины
        $productsQuery = $repository->getWhereIn($ids);
        $products = $productsQuery->get();

        //Берем Общую сумму корзины
        $summPrice = $basket->getSummAllPos($products);

        return view('cart')
            ->with('title', 'Корзина')
            ->with('quantities', $quantities)
            ->with('products', $products)
            ->with('summPrice', $summPrice)
            ->with('nameRoute', 'cart');
    }


    /**
     * Добавляет,
     * Инкрементирует,
     * Декрементирует количество товара в позиции
     * */
    public function changePosCart(Request $request, Basket $basket): \Illuminate\Http\RedirectResponse
    {

        $masRequest = $request->all();

        //Изменяем продукт в корзине
        $basket->addProductsBasket($masRequest);

        return redirect()->back();

    }


    /**
     * Удаляет позицию товара из корзины
     * */
    public function deletePos(Request $request, Basket $basket): \Illuminate\Http\RedirectResponse
    {

        $masRequest = $request->all();

        //Изменяем продукт в корзине
        $hasDelete = $basket->deleteProductsBasket($masRequest);

        return redirect()->back();

    }


    /**
     * Полная очистка корзины
     * */
    public function clearCart(Request $request, Basket $basket): \Illuminate\Http\RedirectResponse
    {

        $masRequest = $request->all();

        //Очищаем корзину
        $basket->clearProductsBasket();

        return redirect()->back();

    }


    /**
     * Страница создания заказа
     */
    public function storeCheckout(Request $request, Basket $basket): \Illuminate\Http\RedirectResponse
    {
        $masRequest = $request->all();

        //Если пустая корзина
            if(count($basket->getPosIds()) === 0) {
                return redirect()->route('confirm_order');
            }
        //Создаем заказ
            $orders = new Orders($masRequest);
            $orders->setBasket($basket);
            $orderObj = $orders->createOrder();

        //Возвращаем результат
            if($orderObj) {
                return redirect()->route('confirm_order', ['order' => $orderObj->id]);
            }
            else {
                return redirect()->route('confirm_order');
            }
    }



    /**
     * Страница удаления заказа
     */
    public function deleteCheckout(Request $request, $orderId): \Illuminate\Http\RedirectResponse
    {
        $masRequest = $request->all();

        //Удаляем заказ
            $orders = new Orders($masRequest);
            $orders->deleteOrder($orderId);

        return redirect()->back();
    }


    /**
     * Страница завершения заказа
     * */
    public function confirmOrder($order='')
    {
        $nameRoute = 'confirmOrder';

        ($order) ? $error = false : $error = true;

        return view('confirm_order')
            ->with('title', 'Завершение заказа')
            ->with('order', $order)
            ->with('error', $error)
            ->with('nameRoute', $nameRoute);

    }



}
