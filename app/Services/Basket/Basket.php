<?php

namespace App\Services\Basket;

use App\Services\Basket\Clears\AuthClear;
use App\Services\Basket\Clears\CookClear;
use App\Services\Basket\Deleters\AuthDeleter;
use App\Services\Basket\Deleters\CookDeleter;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Services\Basket\Positions\BasketPositions;
use App\Services\Basket\Positions\CookPositions;
use App\Services\Basket\Positions\OrderPositions;

use App\Services\Basket\Adders\AuthAdder;
use App\Services\Basket\Adders\CookAdder;


/**
 *  Корзина
 *
 *  $basket = \App\Services\Basket::getInstance();
*/
class Basket
{

    /**
    * Хранилище экземпляра класса.
    */
    private static $instance = null;


    /**
     * Объекты позиций корзины из БД
     */
    private $positions;


    /**
     * Модель текущего пользователя
     * */
    private User|null $user = null;

    /**
     * Id заказа
     * */
    private int|null $orderId = null;


    /**
     * constructor.
     */
    private function __construct()
    {

        if(!empty(Auth::user())) {
            $this->user = Auth::user();
        }

        $this->reloadPropertyBasket();
    }


    /**
     * Синглтон
     * */
    public static function getInstance() {
        if (! self::$instance) {
            self::$instance = new static();
        }
        return self::$instance;
    }


    /**
     * Вычисляет заново все переменные корзины при создании и смене корзины
     * */
    private function reloadPropertyBasket() {
        if($this->user) {
            if($this->orderId) {

                //Позиции заказа текущего пользователя
                    $posObj = new OrderPositions();
                    $this->positions = $posObj->getBasket($this->orderId);

            } else {
                //Позиции корзины текущего пользователя
                    $posObj = new BasketPositions();
                    $this->positions = $posObj->getBasket($this->user->id);
            }

        } else {
            //Позиции корзины Не авторизированного пользователя
                $basketId = null;
                $posObj = new CookPositions();
                $this->positions = $posObj->getBasket($basketId);
        }

    }


    /**
    * Показать продукты из корзины как Массив,
    */
    public function getPosArr()
    {
        $basketPosArr = [];
        if(!empty($this->positions)) {
            foreach ($this->positions as $pos) {
                $basketPosArr[$pos->product_id] = [
                    'product_id' => $pos->product_id,
                    'kolvo' => $pos->kolvo,
                ];
            }
        }
        return $basketPosArr;
    }


    /**
    * Показать продукты из корзины как Массив,
    */
    public function getPosIds()
    {
        $ids = [];
        if(!empty($this->positions)) {
            foreach($this->positions as $pos) {
                $ids[] = $pos->product_id;
            }
        }
        return $ids;
    }


    /**
    * Показать продукты из корзины как Объекты,
    */
    public function getPosObj()
    {
        return $this->positions;
    }


    /**
    * Сумма всех позиций корзины
    */
    public function getSummAllPos($products)
    {
        $summPrice = 0;
        foreach($products as $pos) {
            $summPrice += $pos->price * $this->getPosArr()[$pos->id]['kolvo'];
        }
        return $summPrice;
    }


    /**
     * Добавляем продукт в корзину
     */
    public function addProductsBasket($request): ?int
    {

        if(!empty(Auth::user())) { //Для авторизированных
            $adder = new AuthAdder($request);
        } else {
            $adder = new CookAdder($request);
        }
        $idPos = $adder->addProduct();

        return $idPos;
    }


    /**
     * Удаляем продукт из корзины
     */
    public function deleteProductsBasket($masRequest): bool
    {

        if(!empty(Auth::user())) { //Для авторизированных
            $deleter = new AuthDeleter($masRequest);
        } else {
            $deleter = new CookDeleter($masRequest);
        }
        $hasDelete = $deleter->deleteProduct();

        //Обновляем параметры объекта корзины
            $this->reloadPropertyBasket();

        return $hasDelete;
    }

    /*
     * Очищаем корзину
    */
    public function clearProductsBasket(): bool
    {
        if(!empty(Auth::user())) {
            $clear = new AuthClear();
        } else {
            $clear = new CookClear();
        }

        $hasClear = $clear->clearBasket();

        return $hasClear;
    }




    /**
     * Запрет на клонирование.
     */
    private function __clone() {}

    /**
     * Запрет на unserialize.
     */
    public function __wakeup() {}

}
