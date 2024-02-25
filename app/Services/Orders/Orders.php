<?php

namespace App\Services\Orders;

use App\Models\Order;
use App\Services\Orders\Deleters\BdDeleter;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Services\Basket\Basket;
use App\Services\Orders\Creitors\AuthCreitor;
use App\Services\Orders\Creitors\CookCreitor;
use Illuminate\Support\Facades\Request;

class Orders
{

    protected User|null $user;
    protected Basket|null $basket;
    protected array $request;

    /**
     *
     */
    public function __construct(array $request)
    {
        if(!empty( Auth::user() )) {
            $this->user = Auth::user();
        }
        $this->request = $request;

    }

    /**
     * @param Basket $basket
     */
    public function setBasket(Basket $basket): void
    {
        $this->basket = $basket;
    }



    public function createOrder(): Order|null
    {
        if($this->basket) {
            if ($this->user) {
                $creitor = new AuthCreitor($this->basket);
            } else {
                $creitor = new CookCreitor($this->basket);
            }
            return $creitor->createOrder();
        } else {
            return null;
        }

    }


    public function deleteOrder($orderId): void
    {
        if($orderId) {
            $deleter = new BdDeleter($this->request);
            $deleter->deleteOrder($orderId);
        }

    }


}
