<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use DateTime;

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
                if ($order->updated_at->month == ($index + 1)) {
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
        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        if ((strtotime($request->from_date) - strtotime($request->to_date)) > 0) {
            return redirect()->back()->with('error_date', "Thời gian bắt đầu phải nhỏ hơn thời gian kết thúc");
        }
        $order = Order::all();

        return view('admin.pages.chart_order_by_time', compact('order', 'fromDate', 'toDate'));
    }

    // count day between formDate and toDate
    public function getDays($fromDate, $toDate)
    {
        $from = new DateTime($fromDate);
        $to = new DateTime($toDate);
        $interval = $from->diff($to);
        $daysInInterval = $interval->days + 1;
        $days = [];
        $day = new DateTime($fromDate);
        while ($day <= $to) {
            array_push($days, $day->format('d/m'));
            $day->modify('+1 day');
        }

        return $days;
    }

    public function getPendingByTime($fromDate, $toDate)
    {
        $days = $this->getDays($fromDate, $toDate);
        $pendingByTime = array_fill(0, count($days), 0);
        $orders = Order::where(
            [
                ['status', config('setting.status.pending')],
                ['updated_at', '>=', $fromDate],
                ['updated_at', '<=', $toDate],

            ])->get();

        foreach ($orders as $order) {
            foreach ($days as $key => $day) {
                if ($day == $order->updated_at->format('d/m')) {
                    $pendingByTime[$key]++;
                    break;
                }
            }
        }

        $list = [];
        array_push($list, [
            'days' => $days,
            'pending' => $pendingByTime,
        ]);

        return json_encode($list);
    }

    public function getApprovedByTime($fromDate, $toDate)
    {
        $days = $this->getDays($fromDate, $toDate);
        $approvedByTime = array_fill(0, count($days), 0);
        $orders = Order::where(
            [
                ['status', config('setting.status.approved')],
                ['updated_at', '>=', $fromDate],
                ['updated_at', '<=', $toDate],

            ])->get();

        foreach ($orders as $order) {
            foreach ($days as $key => $day) {
                if ($day == $order->updated_at->format('d/m')) {
                    $approvedByTime[$key]++;
                    break;
                }
            }
        }

        $list = [];
        array_push($list, [
            'days' => $days,
            'approved' => $approvedByTime,
        ]);

        return json_encode($list);
    }

    public function getRejectedByTime($fromDate, $toDate)
    {
        $days = $this->getDays($fromDate, $toDate);
        $rejectedByTime = array_fill(0, count($days), 0);
        $orders = Order::where(
            [
                ['status', config('setting.status.rejected')],
                ['updated_at', '>=', $fromDate],
                ['updated_at', '<=', $toDate],

            ])->get();

        foreach ($orders as $order) {
            foreach ($days as $key => $day) {
                if ($day == $order->updated_at->format('d/m')) {
                    $rejectedByTime[$key]++;
                    break;
                }
            }
        }

        $list = [];
        array_push($list, [
            'days' => $days,
            'rejected' => $rejectedByTime,
        ]);

        return json_encode($list);
    }

    public function getCanceledByTime($fromDate, $toDate)
    {
        $days = $this->getDays($fromDate, $toDate);
        $canceledByTime = array_fill(0, count($days), 0);
        $orders = Order::where(
            [
                ['status', config('setting.status.canceled')],
                ['updated_at', '>=', $fromDate],
                ['updated_at', '<=', $toDate],

            ])->get();

        foreach ($orders as $order) {
            foreach ($days as $key => $day) {
                if ($day == $order->updated_at->format('d/m')) {
                    $canceledByTime[$key]++;
                    break;
                }
            }
        }

        $list = [];
        array_push($list, [
            'days' => $days,
            'canceled' => $canceledByTime,
        ]);

        return json_encode($list);
    }
}
