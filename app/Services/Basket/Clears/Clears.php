<?php

namespace App\Services\Basket\Clears;

use App\Models\User;
use App\Repositories\BasketpositionRepository;
use Illuminate\Support\Facades\Auth;

abstract class Clears
{

    protected array $repositories = [];
    protected User|null $user;

    /**
     * @param array $repositories
     */
    public function __construct()
    {
        $this->repositories['basketposition'] = new BasketpositionRepository();
        if(!empty( Auth::user() )) {
            $this->user = Auth::user();
        }
    }

    abstract public function clearBasket(): bool;
}
