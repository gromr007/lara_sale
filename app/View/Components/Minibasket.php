<?php

namespace App\View\Components;

use App\Repositories\ProductRepository;
use App\Services\Basket\Basket;
use Illuminate\View\Component;



/**
 * Мини Корзина
 *   Вызов компонента
 *       <x-mini-basket />
 *   Шаблон:
 *       resources/views/components/mini-basket.blade.php
 * */
class MiniBasket extends Component
{

    private $basket;
    private $repository;

    public $quantities;
    public $positions;
    public $summPrice;

    /**
     * Свойства / методы, которые не должны использоваться в шаблоне компонента.
     *
     * @var array
     */
    protected $except = ['type'];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Basket $basket, ProductRepository $repository)
    {
        //Берем корзину
            $this->basket = $basket;
            $this->repository = $repository;

        //Формируем данные
            $this->dataPreparation();

    }

    private function dataPreparation()
    {

        //Берем количество по позициям в корзине
        $quantities = $this->basket->getPosArr();

        //Массив Id товаров в корзине
        $ids = $this->basket->getPosIds();

        //Берем продукты корзины
        $productsQuery = $this->repository->getWhereIn($ids);
        $products = $productsQuery->get();

        //Берем Общую сумму корзины
        $summPrice = $this->basket->getSummAllPos($products);


        $this->positions = $products;
        $this->quantities = $quantities;
        $this->summPrice = $summPrice;
    }

    /**
     * Контент
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.minibasket');
    }
}
