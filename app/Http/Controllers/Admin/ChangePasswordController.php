<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use App\User;
use Hash;
use Auth;

class ChangePasswordController extends Controller
{
    public function getChangePassword()
    {
        return view('admin.pages.change_password');
    }

    public function postChangePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        if(Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
        }

        return redirect()->route('admin.dashboard');
    }
}
