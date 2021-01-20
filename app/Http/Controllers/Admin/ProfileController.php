<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Auth;

class ProfileController extends Controller
{
    public function getProfile()
    {
    	$admin = Auth::guard('admin')->user();

    	return view('admin.pages.profile', compact('admin'));
    }

    public function changeProfile(ProfileRequest $request)
    {
    	$admin = Auth::guard('admin')->user();
    	$admin->update([
    		'name' => $request->name,
    		'address' => $request->address,
    		'phone' => $request->phone,
    	]);

    	return redirect()->back();
    }
}
