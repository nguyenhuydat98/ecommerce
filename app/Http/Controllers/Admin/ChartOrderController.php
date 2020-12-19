<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class ChartOrderController extends Controller
{
    public function getView()
    {
        $orders = Order::all();
        $pending = $orders->where('status', config('setting.status.pending'))->count();
        $approved = $orders->where('status', config('setting.status.approved'))->count();
        $rejected = $orders->where('status', config('setting.status.rejected'))->count();
        $canceled = $orders->where('status', config('setting.status.canceled'))->count();

        return view('admin.pages.chart_order', compact(
            'pending',
            'approved',
            'rejected',
            'canceled'
        ));
    }

    public function getStatusByMonth()
    {
        $pendingByMonth = $approvedByMonth = $rejectedByMonth = $canceledByMonth = array_fill(0, 12, 0);
        $orders = Order::all();
        foreach ($orders as $order) {
            for ($index = 0; $index < 12; $index++) {
                if ($order->created_at->month == ($index + 1)) {
                    switch ($order->status) {
                        case config('setting.status.pending'):
                            $pendingByMonth[$index]++;
                            break;

                        case config('setting.status.approved'):
                            $approvedByMonth[$index]++;
                            break;

                        case config('setting.status.rejected'):
                            $rejectedByMonth[$index]++;
                            break;

                        default:
                            $canceledByMonth[$index]++;
                    }
                }
            }
        }
        $list = [];
        array_push($list, [
            'pending' => $pendingByMonth,
            'approved' => $approvedByMonth,
            'rejected' => $rejectedByMonth,
            'canceled' => $canceledByMonth,
        ]);

        return json_encode($list);
    }

    public function getViewOrderByTime(Request $request)
    {
        // dd($request->all());
        $fromDate = strtotime($request->from_date);
        $toDate = strtotime($request->to_date);
        if (($fromDate - $toDate) > 0) {
            return redirect()->back()->with('error_date', "Thời gian bắt đầu phải nhỏ hơn thời gian kết thúc");
        }
        dd("continue");

    }
}
