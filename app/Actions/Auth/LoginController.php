<?php

namespace App\Actions\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Laravel\Fortify\Http\Responses\LogoutResponse;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DOP Login Controller
    |--------------------------------------------------------------------------
    */


    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LogoutResponse
     */
    public function logout(StatefulGuard $guard, Request $request): LogoutResponse
    {

        $guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return app(LogoutResponse::class);
    }


}
