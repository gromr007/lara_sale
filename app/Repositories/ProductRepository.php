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

    public function getPaginate($perPage)
    {
        return Product::query()->paginate($perPage)->withQueryString();
    }

    public function getFirst($productId)
    {
        return Product::where('id', $productId)->first();
    }

}
