<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileUserRequest;
use Auth;

class ProfileController extends Controller
{
    public function getProfileUser()
    {
		$user = Auth::guard('web')->user();

		return view('user.pages.profile', compact('user'));
    }

    public function changeProfile(ProfileUserRequest $request)
    {
        // dd($request->all());
        $user = Auth::guard('web')->user();
        $user->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return view('user.pages.profile', compact('user'));
    }
}
