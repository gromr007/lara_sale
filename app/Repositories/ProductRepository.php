<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{

    public function getWhereIn($ids)
    {

        $productQuery = Product::whereIn('id', $ids);

        return $productQuery;
    }



}
