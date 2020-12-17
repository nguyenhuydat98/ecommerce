<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('admin')->user()->can('viewAny', Category::class)) {
            $categories = Category::all();

            return view('admin.pages.list_category', compact('categories'));
        } else {
            abort(404);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guard('admin')->user()->can('create', Category::class)) {
            return view('admin.pages.create_category');
        } else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if (Auth::guard('admin')->user()->can('create', Category::class)) {
            Category::create([
                'name' => $request->name,
            ]);

            return redirect()->route('admin.categories.index')->with('success', 'Thêm thành công');
        } else {
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::guard('admin')->user()->can('update', Category::class)) {
            $category = Category::findOrFail($id);

            return view('admin.pages.edit_category', compact('category'));
        } else {
            abort(403);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        if (Auth::guard('admin')->user()->can('update', Category::class)) {
            $category = Category::findOrFail($id);
            $category->update([
                'name' => $request->name,
            ]);

            return redirect()->route('admin.categories.index')->with('success', 'Chỉnh sửa thành công');
        } else {
            abort(403);
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
        if (Auth::guard('admin')->user()->can('delete', Category::class)) {
            $category = Category::findOrFail($id);
            $category->delete();

            return redirect()->back()->with('success', 'Xóa thành công');
        } else {
            abort(403);
        }
    }
}
