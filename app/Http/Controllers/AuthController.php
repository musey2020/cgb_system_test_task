<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\AuthRequest;
use App\Http\Service\LoginService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private LoginService $login_service;

    public function __construct()
    {
        $this->login_service = new LoginService();
    }

    public function loginPost(AuthRequest $request)
    {
        if ($this->login_service->login($request->only(['email', 'password']),'admin')) {
            return redirect()->route('dashboard');
        }
        return redirect()->route('admin.login')->withErrors('Email or Password is wrong!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
