<?php

namespace App\Services\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Services\Basket\Basket;
use App\Services\Orders\Creitors\AuthCreitor;
use App\Services\Orders\Creitors\CookCreitor;

class Orders
{

    protected User|null $user;
    protected Basket $basket;

    /**
     *
     */
    public function __construct(Basket $basket)
    {
        if(!empty( Auth::user() )) {
            $this->user = Auth::user();
        }
        $this->basket = $basket;

    }


    public function createOrder(): Order|null
    {
        if($this->user) {
            $creitor = new AuthCreitor($this->basket);
        } else {
            $creitor = new CookCreitor($this->basket);
        }

        return $creitor->createOrder();

    }


}
