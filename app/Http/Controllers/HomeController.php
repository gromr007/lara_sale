<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Главная
     * */
    public function index(Request $request){

        return view('home')
            ->with('title', 'Витрина')
            ->with('nameRoute', 'home');

    }


}
