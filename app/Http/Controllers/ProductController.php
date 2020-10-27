<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(config('setting.paginate.product'));
        $categories = Category::all();

        return view('user.pages.product', compact('products', 'categories'));
    }

    public function getProductDetail($id)
    {
        try {
            $product = Product::findOrFail($id);
            $images = $product->images;

            return view('user.pages.product_detail', compact('product', 'images'));
        } catch (Exception $e) {
            dd("ProductController: " . $e->getMessage());
        }
    }

    public function getQuantityOfProductDetail($id)
    {
        try {
            $productDetail = ProductDetail::findOrFail($id);
            $data = [
                'quantity' => $productDetail->quantity,
                'size' => $productDetail->size,
            ];

            return json_encode($data);
        } catch (Exception $e) {
            dd("ProductController: " . $e->getMessage());
        }
    }
}
