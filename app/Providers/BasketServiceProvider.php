<?php

namespace App\Providers;

use App\Services\Basket\Basket;
use Illuminate\Support\ServiceProvider;

class BasketServiceProvider extends ServiceProvider
{
    public function register(){
        //Синглтон уже внутри класса поэтому без разницы bind или singleton
        $this->app->bind(Basket::class, function ($app) {
            return Basket::getInstance();
        });
    }

}
