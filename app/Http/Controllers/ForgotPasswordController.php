<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ForgotPasswordRequest;
use App\Models\User;
use Hash;
use Mail;
use App\Mail\MailNewPassword;


class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('user.pages.forgot_password');
    }

    public function sendNewPassword(ForgotPasswordRequest $request)
    {
        $users = User::where('email', $request->email)->get();
        if(count($users)) {
            $user = $users[0];
            $password = rand(10000000, 99999999);
            $data = [
                'name' => $user->name,
                'password' => $password,
            ];
            Mail::to($user)->send(new MailNewPassword($data));
            $user->update([
                'password' => Hash::make($password),
            ]);

            return redirect()->route('getLogin');
        } else {
            alert()->error(trans('user.sweetalert.whoops'), "Email này chưa được đăng ký");

            return redirect()->back();
        }
    }
}
