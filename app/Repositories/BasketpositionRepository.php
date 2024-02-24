<?php

namespace App\Repositories;

use App\Models\Basketposition;

class BasketpositionRepository
{

    public function getWithProduct($userId)
    {

        $basketPosQuery = Basketposition::with('product');

        $basketPosQuery->where('user_id', $userId);

        return $basketPosQuery;
    }



}
