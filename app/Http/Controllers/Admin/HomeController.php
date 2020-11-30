<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\ProductInformation;
use App\Models\Order;

class HomeController extends Controller
{
    public function dashboard()
    {
        $totalUser = User::count();
        $totalCategory = Category::count();
        $totalProductInformation = ProductInformation::count();
        $totalOrder = Order::count();

        return view('admin.pages.summary_report', compact(
            'totalUser',
            'totalCategory',
            'totalProductInformation',
            'totalOrder'
        ));
    }
}
