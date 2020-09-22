<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LocalizationController extends Controller
{
    public function changeLanguage(Request $request)
    {
        $lang = $request->language;
        $language   = config('app.locale');
        $english    = config('app.language.en');
        $vietnamese = config('app.language.vi');
        switch ($lang) {
            case $english:
                $language = $english;
                break;
            default:
                $language = $vietnamese;
        }
        Session::put('language', $language);

        return redirect()->back();
    }
}
