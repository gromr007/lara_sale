<?php

namespace App\Services\Basket\Positions;

use App\Repositories\BasketpositionRepository;
use App\Repositories\OrderpositionRepository;

abstract class Positions
{

    protected array $repositories = [];

    /**
     * @param array $repositories
     */
    public function __construct()
    {
        $this->repositories['basketposition'] = new BasketpositionRepository();
        $this->repositories['orderposition'] = new OrderpositionRepository();
    }


    abstract public function getBasket($id);
}
