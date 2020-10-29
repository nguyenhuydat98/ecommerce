<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;
use Session;
use Alert;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productDetail = ProductDetail::where('product_id', $request->product_id)
            ->where('color', $request->color)
            ->first();
        if ($productDetail) {
            if ((int) $request->quantity > $productDetail->quantity) {
                alert()->error(trans('user.sweetalert.whoops'), trans('user.sweetalert.quantity_not_enough'));

                return redirect()->back();
            }
            $cart = Session::get('cart');
            if ($cart) {
                $numberOfItemInCart = Session::get('numberOfItemInCart');
                foreach ($cart as $key => $item) {
                    if ($item['product_detail_id'] == $productDetail->id && $item['product_id'] == $productDetail->product_id) {
                        $cart[$key]['quantity'] += $request->quantity;
                        Session::put('cart', $cart);
                        $numberOfItemInCart += $request->quantity;
                        Session::put('numberOfItemInCart', $numberOfItemInCart);
                        Session::save();
                        alert()->success(trans('user.sweetalert.done'), trans('user.sweetalert.add_to_cart'));

                        return redirect()->back();
                    }
                }
                Session::push('cart', [
                    'product_detail_id' => $productDetail->id,
                    'product_id' => $productDetail->product_id,
                    'quantity' => (int) $request->quantity,
                    'color' => $request->color,
                    'unit_price' => (int) $productDetail->product->current_price,
                ]);
                $numberOfItemInCart += $request->quantity;
                Session::put('numberOfItemInCart', $numberOfItemInCart);
                Session::save();
            } else {
                Session::put('cart', [
                    [
                        'product_detail_id' => $productDetail->id,
                        'quantity' => (int) $request->quantity,
                        'color' => $request->color,
                        'unit_price' => (int) $productDetail->product->current_price,
                    ],
                    ]);
                    Session::put('numberOfItemInCart', $request->quantity);
                    Session::save();
            }
            alert()->success(trans('user.sweetalert.done'), trans('user.sweetalert.add_to_cart'));
        }

        return redirect()->back();
    }
}
