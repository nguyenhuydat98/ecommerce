<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductInformation;
use Auth;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        $productInformations = ProductInformation::orderBy('id', 'desc')->get();

        // Sản phẩm phổ biến
        $listIphoneMinPrice = [];
        $listIphoneMaxPrice = [];

        $listSamSungMinPrice = [];
        $listSamSungMaxPrice = [];
        foreach ($productInformations as $productInformation) {
            if ($productInformation->category_id == 1) {
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
                array_push($listIphoneMinPrice, $minPrice);
                array_push($listIphoneMaxPrice, $maxPrice);
            }

            if ($productInformation->category_id == 2) {
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
                array_push($listSamSungMinPrice, $minPrice);
                array_push($listSamSungMaxPrice, $maxPrice);
            }
        }

        // Sản phẩm đánh giá cao
        $productInformationRates = ProductInformation::where('rate', '<>', null)
            ->orderBy('rate', 'desc')
            ->take(6)
            ->get();

        $rateMinPrice = [];
        $rateMaxPrice = [];

        foreach ($productInformationRates as $productInformation) {
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
            array_push($rateMinPrice, $minPrice);
            array_push($rateMaxPrice, $maxPrice);
        }

        return view('user.pages.home', compact(
            'categories',
            'productInformations',
            'listIphoneMinPrice',
            'listIphoneMaxPrice',
            'listSamSungMinPrice',
            'listSamSungMaxPrice',
            'productInformationRates',
            'rateMinPrice',
            'rateMaxPrice'
        ));
    }
}
