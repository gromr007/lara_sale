<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{

    public function getAll()
    {
        return Order::with('products')->get();
    }

    public function getPaginate($perPage)
    {
        return Order::query()->paginate($perPage)->withQueryString();
    }

    public function getFirstId($userId, $orderId)
    {
        return Order::where('user_id', $userId)->where('id', $orderId)->first();
    }


}
