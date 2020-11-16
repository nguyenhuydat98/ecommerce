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

        $listMinPrice = [];
        $listMaxPrice = [];
        foreach ($productInformations as $productInformation) {
            $minPrice = $productInformation->products->first()->unit_price;
            $maxPrice = $minPrice;
            foreach ($productInformation->products as $product) {
                if ($minPrice > $product->unit_price) {
                    $minPrice = $product->unit_price;
                }
                if ($maxPrice < $product->unit_price) {
                    $maxPrice = $product->unit_price;
                }
            }
            array_push($listMinPrice, $minPrice);
            array_push($listMaxPrice, $maxPrice);
        }

        return view('user.pages.product', compact('productInformations', 'categories', 'listMinPrice', 'listMaxPrice'));
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
            $minPrice = $productInformation->products->first()->unit_price;
            $maxPrice = $minPrice;
            foreach ($productInformation->products as $product) {
                if ($minPrice > $product->unit_price) {
                    $minPrice = $product->unit_price;
                }
                if ($maxPrice < $product->unit_price) {
                    $maxPrice = $product->unit_price;
                }
            }

            return view('user.pages.product_detail', compact('productInformation', 'images', 'minPrice', 'maxPrice'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getQuantityOfProductDetail($id)
    {
        try {
            $product = Product::findOrFail($id);
            $data = [
                'id' => $id,
                'quantity' => $product->quantity,
                'color' => $product->color_id,
                'unit_price' => number_format($product->unit_price) . " đ",
            ];

            return json_encode($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
