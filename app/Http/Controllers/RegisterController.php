<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Hash;

class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('user.pages.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 1,
            ]);

            return redirect()->route('getLogin');
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }
}
