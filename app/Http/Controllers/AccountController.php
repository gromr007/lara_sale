<?php

namespace App\Http\Controllers;

class AccountController extends Controller
{

    /**
     * Личный кабинет
     * */
    public function index(){

        return view('account')
            ->with('title', 'Личный кабинет')
            ->with('nameRoute', 'account');

    }

}
