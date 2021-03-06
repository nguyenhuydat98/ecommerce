<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('user.pages.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $account = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::guard('web')->attempt($account, $request->remember)) {
            return redirect()->route('home');
        }

        return redirect()->route('getLogin');
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->back();
    }
}
