<?php

namespace App\Http\Controllers;
use App\Repositories\ProductRepository;
use App\Services\Basket\Basket;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Главная
     * */
    public function index(Request $request, ProductRepository $repository, Basket $basket){

        //Берем продукты с пагинацией
            $products = $repository->getPaginate(5);

        //Приводим к нужному виду
            $productsBasketIds = $basket->getPosIds();

        return view('home')
            ->with('title', 'Витрина')
            ->with('products', $products)
            ->with('productsBasketIds', $productsBasketIds)
            ->with('nameRoute', 'home');

    }


}
