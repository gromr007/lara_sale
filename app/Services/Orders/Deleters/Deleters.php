<?php

namespace App\Services\Orders\Deleters;

use App\Models\User;
use App\Repositories\OrderpositionRepository;
use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Auth;

abstract class Deleters
{

    protected array $repositories = [];
    protected array $request = [];
    protected User|null $user;

    /**
     * @param array $repositories
     */
    public function __construct(array $request)
    {
        $this->repositories['order'] = new OrderRepository();
        $this->repositories['orderposition'] = new OrderpositionRepository();
        $this->request = $request;
        if(!empty( Auth::user() )) {
            $this->user = Auth::user();
        }
    }

    abstract public function deleteOrder(int $orderId): void;
}
