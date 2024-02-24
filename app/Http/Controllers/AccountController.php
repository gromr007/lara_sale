<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;

class AccountController extends Controller
{

    /**
     * Личный кабинет
     * */
    public function index(OrderRepository $repository){

        $orders = $repository->getAll();

        return view('account')
            ->with('title', 'Личный кабинет')
            ->with('nameRoute', 'account');

    }

}
