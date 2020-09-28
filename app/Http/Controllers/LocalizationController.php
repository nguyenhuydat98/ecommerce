<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LocalizationController extends Controller
{
    public function changeLanguage(Request $request)
    {
        Session::put('language', $request->language);

        return redirect()->back();
    }
}
