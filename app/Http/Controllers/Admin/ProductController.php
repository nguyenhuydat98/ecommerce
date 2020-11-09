<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Image;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('productDetails', 'category')->get();
        $listAmount = [];
        foreach ($products as $product) {
            $amount = 0;
            foreach ($product->productDetails as $productDetail) {
                $amount += $productDetail->quantity;
            }
            array_push($listAmount, $amount);
        }

        return view('admin.pages.list_product', compact('products', 'listAmount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.pages.create_product', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if ($request->hasFile('images')) {
            $product = Product::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'brand' => $request->brand,
                'description' => $request->description,
                'original_price' => $request->original_price,
                'current_price' => $request->current_price,
            ]);
            $this->setupProductDetail($product->id);
            $this->uploadFile($request, $product->id);
        }

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $product = Product::findOrFail($id);
            $productDetails = ProductDetail::where('product_id', $product->id)->get();
            $images = Image::where('product_id', $product->id)->get();

            return view('admin.pages.product_detail', compact('product', 'productDetails', 'images'));
        } catch (Exception $e) {
            return $e->getMessage();
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
        try {
            $product = Product::findOrFail($id);
            $categories = Category::all();

            return view('admin.pages.edit_product', compact('product', 'categories'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'brand' => $request->brand,
                'description' => $request->description,
                'original_price' => $request->original_price,
                'current_price' => $request->current_price,
            ]);

            return redirect()->route('admin.products.index');
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
        dd("Nếu xóa SP thì phải xóa cả product_details và images của SP đó");
    }

    public function uploadFile(Request $request, $idProduct)
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                Image::create([
                    'product_id' => $idProduct,
                    'image_link' => 'storage/' . $file->getClientOriginalName(),
                ]);
                $file->move('storage', $file->getClientOriginalName());
            }
        }

        return true;
    }

    public function setupProductDetail($idProduct)
    {
        for ($color = 1; $color <= 4; $color++) {
            ProductDetail::create([
                'product_id' => $idProduct,
                'color' => $color,
                'quantity' => 0,
            ]);
        }
    }
}
