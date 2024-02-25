<?php

namespace App\Repositories;

use App\Models\Basketposition;

class BasketpositionRepository
{

    public function getWithProduct($userId): \Illuminate\Database\Eloquent\Builder
    {

        $basketPosQuery = Basketposition::with('product');

        $basketPosQuery->where('user_id', $userId);

        return $basketPosQuery;
    }

    public function getProductUser($productId, $userId): ?Basketposition
    {

        return Basketposition::where('product_id', '=', $productId)
            ->where('user_id', '=', $userId)
            ->first();

    }




}
