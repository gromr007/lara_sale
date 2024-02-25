<?php

namespace App\Services\Basket\Adders;

use App\Models\User;
use App\Repositories\BasketpositionRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Auth;

abstract class Adders
{

    protected array $repositories = [];
    protected array $request = [];
    protected User|null $user;

    /**
     * @param array $repositories
     */
    public function __construct(array $masRequest)
    {
        $this->repositories['product'] = new ProductRepository();
        $this->repositories['basketposition'] = new BasketpositionRepository();
        $this->request = $masRequest;
        if(!empty( Auth::user() )) {
            $this->user = Auth::user();
        }
    }


    abstract public function addProduct(): int|null;
}
