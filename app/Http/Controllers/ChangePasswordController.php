<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use Auth;
use Hash;
use Alert;

class ChangePasswordController extends Controller
{
    public function changePassword(ChangePasswordRequest $request)
    {
        dd($request->all());
        $user = Auth::guard('web')->user();
        if(Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            alert()->success(trans('user.sweetalert.done'));
        } else {
            alert()->error(trans('user.sweetalert.whoop'));
        }

        return redirect()->back();
    }
}
