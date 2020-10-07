<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('admin.pages.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $account = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($account, $request->remember)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.getLogin');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin.getLogin');
    }
}
