<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ForgotPasswordRequest;
use App\Models\Admin;
use Hash;
use Mail;
use App\Mail\MailNewPassword;

class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('admin.pages.forgot_password');
    }

    public function sendNewPassword(ForgotPasswordRequest $request)
    {
        $admins = Admin::where('email', $request->email)->get();
        if(count($admins)) {
            $admin = $admins[0];
            $password = rand(10000000, 99999999);
            $data = [
                'name' => $admin->name,
                'password' => $password,
            ];
            Mail::to($admin)->send(new MailNewPassword($data));
            $admin->update([
                'password' => Hash::make($password),
            ]);

            return redirect()->route('admin.getLogin');
        } else {
            return redirect()->back();
        }
    }
}
