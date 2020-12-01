<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use App\Http\Requests\AdminRequest;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();

        return view('admin.pages.list_admin', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.pages.create_admin', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        Admin::create([
            'role_id' => $request->role_id,
            'email' => $request->email,
            'password' => '$2y$10$fSz9qggDZ2LYzXFzYHLTmOGEUzUmmO5bmBuHaBf7fPX3wppSareEG',
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'avatar' => config('setting.default.avatar'),
        ]);

        return redirect()->route('admin.admins.index')->with('done', 'Thao tác thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::findOrFail($id);

        return view('admin.pages.admin_detail', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        $roles = Role::all();

        return view('admin.pages.edit_admin', compact('admin', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $admin = Admin::findOrFail($id);
            $admin->update([
                'role_id' => $request->role_id,
                'email' => $request->email,
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
            ]);

            return redirect()->route('admin.admins.index')->with('done', 'Thao tác thành công!');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if (Auth::guard('admin')->id() == $id) {
                return redirect()->route('admin.admins.index')->with('error_delete', 'Thất bại! Không thể xóa tài khoản của mình');
            }
            $admin = Admin::findOrFail($id);
            $admin->delete();

            return redirect()->route('admin.admins.index')->with('done', 'Thao tác thành công!');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
