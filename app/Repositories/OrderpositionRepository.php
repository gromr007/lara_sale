<?php

namespace App\Repositories;

use App\Models\Orderposition;

class OrderpositionRepository
{

    public function getWithProduct($userId)
    {
        $basketPosQuery = Orderposition::all();
        return $basketPosQuery;
    }

    public function getPositionsQuery($orderId)
    {
        $orderPos = Orderposition::where('order_id', $orderId);
        return $orderPos;
    }


}
