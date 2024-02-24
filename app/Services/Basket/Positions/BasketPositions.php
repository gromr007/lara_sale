<?php

namespace App\Services\Basket\Positions;

use App\Repositories\BasketpositionRepository;

class Basketpositions extends Positions
{
    public function getBasket($id)
    {
        $query = $this->repositories['basketposition']->getWithProduct($id);
        return $query->get();
    }
}
