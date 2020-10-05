<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role != 0) {
                Auth::logout();
            }
        }

        return view('user.pages.home');
    }
}
