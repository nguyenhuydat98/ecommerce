<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Http\Requests\CheckoutRequest;
use Auth;
use Session;
use DB;

class OrderController extends Controller
{
    public function getListItem()
    {
        $cart = Session::get('cart');
        $user = Auth::user();
        $productInCart = [];
        foreach ($cart as $item) {
            $product = Product::findOrFail($item['product_id']);
            array_push($productInCart, [
                'product_id' => $item['product_id'],
                'name' => $product->productInformation->name,
                'image_link' => $product->images->first()->image_link,
                'color' => $product->color->name,
                'quantity' => $item['quantity'],
                'unit_price' => $product->unit_price,
                'sale_id' => $product->sale_id,
            ]);
        }

        return view('user.pages.checkout', compact('user', 'productInCart'));
    }

    public function checkout(CheckoutRequest $request)
    {
        DB::beginTransaction();
        try {
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
                $product = Product::findOrFail($item['product_id']);
                // if ($product->sale_id == null) {
                //     $price = $product->unit_price;
                // } else {

                // }
                $price = $product->unit_price;
                $order->products()->attach([
                    $key => [
                        'order_id' => $order->id,
                        'product_id' => $item['product_id'],
                        'quantity' => $item['quantity'],
                        'price' => $price,
                    ],
                ]);
            }
            Session::forget('cart');
            Session::put('numberOfItemInCart', 0);
            Session::save();
            DB::commit();

            return redirect()->route('home');
        } catch (Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }
}
