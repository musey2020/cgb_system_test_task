<?php


namespace App\Http\Service;


use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function login($data, $guard = "web")
    {
        return Auth::guard($guard)->attempt($data);
    }
}
