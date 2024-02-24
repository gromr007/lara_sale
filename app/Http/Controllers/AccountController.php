<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use App\Services\Account;

class AccountController extends Controller
{

    /**
     * Личный кабинет
     * */
    public function index(OrderRepository $repository, Account $account){

        $orders = $repository->getAll();

        $summAll = $account->getSummAllOrders();

        return view('account')
            ->with('title', 'Личный кабинет')
            ->with('orders', $orders)
            ->with('summAll', $summAll)
            ->with('nameRoute', 'account');

    }

}
