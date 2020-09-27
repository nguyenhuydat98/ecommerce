<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use App\User;
use Hash;

class ChangePasswordController extends Controller
{
    public function getChangePassword()
    {
        return view('admin.pages.change_password');
    }

    public function postChangePassword(ChangePasswordRequest $request)
    {
        dd('postChangePassword');
    }
}
