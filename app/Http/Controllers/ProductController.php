<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(config('user.paginate.product'));
        $categories = Category::where('parent_id', null)->get();
        $children = Category::where('parent_id', '<>', null)->get();

        return view('user.pages.product', compact('products', 'categories', 'children'));
    }
}
