<?php

namespace App\Services\Basket\Positions;

class Basketpositions extends Positions
{
    public function getBasket($id)
    {
        $query = $this->repositories['basketposition']->getWithProduct($id);
        return $query->get();
    }
}
