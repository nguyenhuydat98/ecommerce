<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ProductInformation;

class ProductStatisticController extends Controller
{
    public function getProductStatistic()
    {
        return view('admin.pages.product_statistic');
    }

    public function getDataProductStatistic()
    {
        $productInformations = ProductInformation::all();
        $item = [];
        foreach ($productInformations as $productInformation) {
            // $item[$productInformation->id] = $productInformation->name;
            array_push($item, $productInformation->name);
        }
        $listQuantity = [];
        foreach ($productInformations as $productInformation) {
            $listQuantity[$productInformation->id] = 0;
        }
        $orders = Order::all();
        foreach ($orders as $order) {
            foreach ($order->products as $product) {
                foreach ($listQuantity as $key => $quantity) {
                    if ($key == $product->product_information_id) {
                        $listQuantity[$key]++;
                        break;
                    }
                }
            }
        }
        $quantity = [];
        foreach ($listQuantity as $value) {
            array_push($quantity, $value);
        }
        $list = [];
        array_push($list, [
            'item' => $item,
            'quantity' => $quantity,
        ]);
        // dd($list);

        return json_encode($list);
    }
}
