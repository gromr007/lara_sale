<?php

namespace App\Services\Orders\Creitors;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Repositories\BasketpositionRepository;
use App\Repositories\OrderpositionRepository;
use App\Services\Basket\Basket;

abstract class Creitor
{
    protected array $repositories = [];
    protected Basket $basket;
    protected User|null $user;

    /**
     * @param array $repositories
     */
    public function __construct($basket)
    {
        $this->repositories['basketposition'] = new BasketpositionRepository();
        $this->repositories['orderposition'] = new OrderpositionRepository();
        $this->basket = $basket;
        if(!empty( Auth::user() )) {
            $this->user = Auth::user();
        }
    }

    abstract public function createOrder(): Order|null;

}
