<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductInformation;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $productInformations = ProductInformation::orderBy('id', 'desc')
            ->with('products.images')
            ->paginate(config('setting.paginate.product'));

        return view('user.pages.product', compact('productInformations', 'categories'));
    }

    public function getProductDetail($id)
    {
        try {
            $productInformation = ProductInformation::findOrFail($id);
            $images = [];
            foreach ($productInformation->products as $product) {
                foreach ($product->images as $image) {
                    array_push($images, $image);
                }
            }

            return view('user.pages.product_detail', compact('productInformation', 'images'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getQuantityOfProductDetail($id)
    {
        try {
            $product = Product::findOrFail($id);
            $data = [
                'id' => $product->id,
                'quantity' => $product->quantity,
                'color' => $product->color_id,
                'unit_price' => number_format($product->unit_price) . " VND",
            ];

            return json_encode($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
