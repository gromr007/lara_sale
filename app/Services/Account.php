<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Auth;


/**
 *  Класс Личного кабинета
*/
class Account
{
    private $repository;

    public function __construct()
    {
        $this->repository = new OrderRepository();
    }

    public function getSummAllOrders()
    {
        $summ = 0;

        $orders = $this->repository->getAll();
        foreach($orders as $order) {
            $summ += $order->summ;
        }

        return $summ;
    }

}
