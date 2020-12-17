<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductInformation;
use App\Models\Product;
use App\Models\Image;
use App\Models\Color;
use App\Http\Requests\ProductInformationRequest;
use Auth;

class ProductInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('admin')->user()->can('viewAny', ProductInformation::class)) {
            $productInformations = ProductInformation::with('products', 'category')->get();
            $listAmount = [];
            foreach ($productInformations as $productInformation) {
                $amount = 0;
                foreach ($productInformation->products as $product) {
                    $amount += $product->quantity;
                }
                array_push($listAmount, $amount);
            }

            return view('admin.pages.list_product_information', compact('productInformations', 'listAmount'));
        } else {
            abort(401);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guard('admin')->user()->can('create', ProductInformation::class)) {
            $categories = Category::all();

            return view('admin.pages.create_product_information', compact('categories'));
        } else {
            abort(401);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductInformationRequest $request)
    {
        if (Auth::guard('admin')->user()->can('create', ProductInformation::class)) {
            ProductInformation::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'brand' => $request->brand,
                'description' => $request->description,
            ]);

            return redirect()->route('admin.product_informations.index')->with('success', 'Thêm thành công');
        } else {
            abort(401);
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
        if (Auth::guard('admin')->user()->can('view', ProductInformation::class)) {
            $colors = Color::all();
            $productInformation = ProductInformation::findOrFail($id);
            $products = Product::where('product_information_id', $productInformation->id)
                ->with('images')
                ->get();

            return view('admin.pages.product_detail', compact('productInformation', 'products', 'colors'));
        } else {
            abort(401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::guard('admin')->user()->can('update', ProductInformation::class)) {
            $productInformation = ProductInformation::findOrFail($id);
            $categories = Category::all();

            return view('admin.pages.edit_product_information', compact('productInformation', 'categories'));
        } else {
            abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductInformationRequest $request, $id)
    {
        if (Auth::guard('admin')->user()->can('update', ProductInformation::class)) {
            $productInformation = ProductInformation::findOrFail($id);
            $productInformation->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'brand' => $request->brand,
                'description' => $request->description,
            ]);

            return redirect()->route('admin.product_informations.index')->with('success', 'Chỉnh sửa thành công');
        } else {
            abort(401);
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
        if (Auth::guard('admin')->user()->can('delete', ProductInformation::class)) {
            dd("Nếu xóa SP thì phải xóa cả product_details và images của SP đó");
        } else {
            abort(401);
        }
    }
}
