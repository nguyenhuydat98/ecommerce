<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Voucher;
use App\Models\Admin;
use App\Http\Requests\CheckoutRequest;
use App\Notifications\NewOrderNotification;
use Auth;
use Session;
use DB;

class OrderController extends Controller
{
    public function getListItem($idVoucher = null)
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
        $vouchers = Voucher::where('end_date', '>=', now())->get();
        $chooseVoucher = null;
        if ($idVoucher) {
            $chooseVoucher = Voucher::findOrFail($idVoucher);
        }

        $existVoucher = false;
        if (count($vouchers) > 0) {
            foreach ($vouchers as $voucher) {
                if ($voucher->start_date <= now()) {
                    $existVoucher = true;
                    break;
                }
            }
        }

        return view('user.pages.checkout', compact('user', 'productInCart', 'vouchers', 'chooseVoucher', 'existVoucher'));
    }

    public function checkout(CheckoutRequest $request)
    {
        DB::beginTransaction();
        try {
            if ($request->voucher_id) {
                $voucher = Voucher::findOrFail($request->voucher_id);
                if (now() >= $voucher->end_date) {
                    alert()->error(trans('user.sweetalert.whoops'), "Mã khuyến mại đã hết hạn");

                    return redirect()->route('getListItem');
                }
            }
            $order = Order::create([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'total_payment' => $request->payment,
                'status' => config('setting.status.pending'),
                'note' => $request->note,
            ]);
            if ($request->voucher_id) {
                $order->update([
                    'voucher_id' => $request->voucher_id,
                ]);
            }
            $admins = Admin::where('role_id', config('setting.role.management'))
                ->orWhere('role_id', config('setting.role.admin_order'))
                ->get();
            $notification = [
                'order_id' => $order->id,
                'content' => 'notification.new_order',
            ];
            $admins->each->notify(new NewOrderNotification($notification));

            $cart = Session::get('cart');
            foreach ($cart as $key => $item) {
                $product = Product::findOrFail($item['product_id']);
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
            alert()->success(trans('user.sweetalert.done'), "Đơn hàng đang được xử lí");
            DB::commit();

            return redirect()->route('orderHistory');
        } catch (Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function getListOrder()
    {
        $orders = Order::orderBy('created_at', 'desc')
            ->where('user_id', Auth::guard('web')->id())
            ->paginate(config('setting.paginate.order'));

        return view('user.pages.order_history', compact('orders'));
    }

    public function getListOrderByStatus()
    {
        $orders = Order::orderBy('created_at', 'desc')->where('user_id', Auth::guard('web')->id())->get();
        $existPending = false;
        $existApproved = false;
        $existRejected = false;
        $existCanceled = false;
        foreach ($orders as $order) {
            if ($order->status == config('setting.status.pending')) {
                $existPending = true;
            }
            else if ($order->status == config('setting.status.approved')) {
                $existApproved = true;
            }
            else if ($order->status == config('setting.status.rejected')) {
                $existRejected = true;
            }
            else {
                $existCanceled = true;
            }
        }

        return view('user.pages.order_history_by_status', compact('orders', 'existPending', 'existApproved', 'existRejected', 'existCanceled'));
    }

    public function getOrder($id)
    {
        $order = Order::findOrFail($id);
        $voucher = $order->voucher;
        $listProduct = [];
        foreach ($order->products as $product) {
            $prod = Product::findOrFail($product->pivot->product_id);
            array_push($listProduct, [
                'name' => $prod->productInformation->name,
                'image_link' => $prod->images->first()->image_link,
                'color' => $prod->color->name,
            ]);
        }

        return view('user.pages.order_detail', compact('order', 'listProduct', 'voucher'));
    }

    public function cancelOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => config('setting.status.canceled'),
        ]);
        alert()->success(trans('user.sweetalert.done'), 'Đã hủy đơn hàng của bạn');

        return redirect()->back();
    }

    public function chooseVoucher(Request $request)
    {
        $voucher = Voucher::find($request->code);

        return redirect()->route('getListItem', [$voucher->id]);
    }
}
