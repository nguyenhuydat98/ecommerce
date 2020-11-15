<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductInformation;
use App\Models\Product;
use App\Models\Image;
use App\Http\Requests\ProductInformationRequest;

class ProductInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.pages.create_product_information', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductInformationRequest $request)
    {
        ProductInformation::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'brand' => $request->brand,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.product_informations.index');
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
            $productInformation = ProductInformation::findOrFail($id);
            $products = Product::where('product_information_id', $productInformation->id)
                ->with('images')
                ->get();

            return view('admin.pages.product_detail', compact('productInformation', 'products'));
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
            $productInformation = ProductInformation::findOrFail($id);
            $categories = Category::all();

            return view('admin.pages.edit_product_information', compact('productInformation', 'categories'));
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
    public function update(ProductInformationRequest $request, $id)
    {
        try {
            $productInformation = ProductInformation::findOrFail($id);
            $productInformation->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'brand' => $request->brand,
                'description' => $request->description,
            ]);

            return redirect()->route('admin.product_informations.index');
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
}
