<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Auth;
use DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();

        return view('admin.pages.list_order', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        $listProduct = [];
        foreach ($order->products as $product) {
            $prod = Product::findOrFail($product->pivot->product_id);
            array_push($listProduct, [
                'name' => $prod->productInformation->name,
                'image_link' => $prod->images->first()->image_link,
                'color' => $prod->color->name,
            ]);
        }

        return view('admin.pages.order_detail', compact('order', 'listProduct'));
    }

    public function rejectedOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'admin_id' => Auth::guard('admin')->id(),
            'status' => config('setting.status.rejected'),
        ]);

        return redirect()->route('admin.orders.index')->with('message_rejected', 'Hoàn thành! Đã từ chối đơn hàng');
    }

    public function approvedOrder($id)
    {
        $order = Order::findOrFail($id);


        DB::beginTransaction();
        try {
            $order = Order::findOrFail($id);
            foreach ($order->products as $product) {
                $productInStore = Product::findOrFail($product->pivot->product_id);
                if ($productInStore->quantity >= $product->pivot->quantity) {
                    $productInStore->update([
                        'quantity' => $productInStore->quantity - $product->pivot->quantity,
                    ]);
                } else {
                    return redirect()->route('admin.orders.index')->with('message_approved_error', 'Thất bại! Không đủ số lượng sản phẩm');
                }
            }
            $order->update([
                'admin_id' => Auth::guard('admin')->id(),
                'status' => config('setting.status.approved'),
            ]);
            DB::commit();

            return redirect()->route('admin.orders.index')->with('message_approved_success', 'Hoàn thành! Đã chấp nhận đơn hàng');
        } catch (Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }

    }
}
