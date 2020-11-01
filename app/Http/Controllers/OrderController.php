<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Http\Requests\CheckoutRequest;
use Auth;
use Session;

class OrderController extends Controller
{
    public function getListItem()
    {
        $cart = Session::get('cart');
        $user = Auth::user();
        $names =[];
        foreach ($cart as $item) {
            $product = Product::findOrFail($item['product_id']);
            array_push($names, $product->name);
        }

        return view('user.pages.checkout', compact('cart', 'user', 'names'));
    }

    public function checkout(CheckoutRequest $request)
    {
        // dd($request->all());
        $order = Order::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'total_payment' => $request->payment,
            'status' => config('setting.status.pending'),
            'note' => $request->note,
        ]);
        $cart = Session::get('cart');
        foreach ($cart as $key => $item) {
            $order->productDetails()->attach([
                $key => [
                    'order_id' => $order->id,
                    'product_detail_id' => $item['product_detail_id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                ],
            ]);
        }
        Session::forget('cart');
        Session::put('numberOfItemInCart', 0);
        Session::save();

        return redirect()->route('home');
    }
}
