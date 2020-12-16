<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->user()->can('viewAny', User::class)) {
            $users = User::orderBy('created_at', 'desc')->get();

            return view('admin.pages.list_user', compact('users'));
        } else {
            abort(401);
        }
    }

    public function show($id)
    {
        if (Auth::guard('admin')->user()->can('viewAny', User::class)) {
            $user = User::findOrFail($id);

            return view('admin.pages.user_detail', compact('user'));
        } else {
            abort(401);
        }
    }
}
