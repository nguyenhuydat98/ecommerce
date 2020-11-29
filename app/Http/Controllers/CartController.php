<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductInformation;
use App\Models\Product;
use Session;
use Alert;

class CartController extends Controller
{
    public function cart()
    {
        $cart = [];
        $productInCart = [];
        if (Session::has('numberOfItemInCart') && Session::get('numberOfItemInCart') > 0) {
            $cart = Session::get('cart');
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
        }

        return view('user.pages.cart', compact('productInCart'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        if ($product) {
            if ((int) $request->quantity > $product->quantity) {
                alert()->error(trans('user.sweetalert.whoops'), trans('user.sweetalert.quantity_not_enough'));

                return redirect()->back();
            }
            $cart = Session::get('cart');
            if ($cart) {
                $numberOfItemInCart = Session::get('numberOfItemInCart');
                foreach ($cart as $key => $item) {
                    if ($item['product_id'] == $product->id) {
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
                    'product_id' => $product->id,
                    'quantity' => (int) $request->quantity,
                    'color_id' => $request->color_id,
                ]);
                $numberOfItemInCart += $request->quantity;
                Session::put('numberOfItemInCart', $numberOfItemInCart);
                Session::save();
            } else {
                Session::put('cart', [
                    [
                        'product_id' => $product->id,
                        'quantity' => (int) $request->quantity,
                        'color_id' => $request->color_id,
                    ],
                ]);
                Session::put('numberOfItemInCart', $request->quantity);
                Session::save();
            }
            alert()->success(trans('user.sweetalert.done'), trans('user.sweetalert.add_to_cart'));
        }

        return redirect()->back();
    }

    public function deleteOneItem(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $cart = Session::get('cart');
        $numberOfItemInCart = Session::get('numberOfItemInCart');
        $items = [];
        foreach ($cart as $item) {
            if ($item['product_id'] == $product->id) {
                $numberOfItemInCart -= $item['quantity'];
                Session::put('numberOfItemInCart', $numberOfItemInCart);
                Session::save();
            } else {
                array_push($items, $item);
            }
        }
        Session::put('cart', $items);
        Session::save();

        return redirect()->back();
    }

    public function deleteAllItem(Request $request)
    {
        Session::forget('cart');
        Session::put('numberOfItemInCart', 0);
        Session::save();

        return redirect()->back();
    }

    public function updateQuantity(Request $request)
    {
        if ($request->quantity > 0) {
            $product = Product::findOrFail($request->product_id);
            if ($request->quantity > $product->quantity) {
                alert()->error(trans('user.sweetalert.whoops'), trans('user.sweetalert.quantity_not_enough'));

                return redirect()->back();
            }
            $cart = Session::get('cart');
            $numberOfItemInCart = Session::get('numberOfItemInCart');
            $items = [];
            foreach ($cart as $item) {
                if ($item['product_id'] == $product->id) {
                    $numberOfItemInCart = $numberOfItemInCart - $item['quantity'] + $request->quantity;
                    Session::put('numberOfItemInCart', $numberOfItemInCart);
                    Session::save();
                    array_push($items, [
                        'product_id' => $product->id,
                        'quantity' => (int) $request->quantity,
                        'color_id' => $item['color_id'],
                    ]);

                } else {
                    array_push($items, $item);
                }
            }
            Session::put('cart', $items);
            Session::save();

            return redirect()->back();
        } else {
            alert()->error("Thất bại", "Số lượng phải lớn hơn 0");

            return redirect()->back();
        }
    }
}
