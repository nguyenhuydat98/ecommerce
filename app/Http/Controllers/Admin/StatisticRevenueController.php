<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class StatisticRevenueController extends Controller
{
    /**
     * Xem thống kê doanh thu của các ngày trong tháng
    */
    public function getViewStatisticRevenue(Request $request)
    {
        if ($request->time == null) {
            $time = date('Y-m');
        } else {
            $time = $request->time;
        }

        return view('admin.pages.statistic_revenue', compact('time'));
    }

    public function getStatisticRevenueInMonth($time)
    {
        $year = (int) date("Y", strtotime($time));
        $month = (int) date("m", strtotime($time));
        $totalDayOfMonth = cal_days_in_month(CAL_GREGORIAN, $month ,$year);

        $dayOfMonth = [];
        for ($day = 1; $day <= $totalDayOfMonth; $day++) {
            array_push($dayOfMonth, $day);
        }

        $orders = Order::where('status', config('setting.status.approved'))
            ->where(function($query) use ($month) {
                $query->whereMonth('updated_at', $month);
            })
            ->get();
        $days = $orders->groupBy(function($order) {
            return Carbon::parse($order->updated_at)->format('d');
        });
        $listRevenue = array_fill(0, count($dayOfMonth), 0);
        foreach ($days as $day => $orders) {
            $index = (int) $day - 1;
            $listRevenue[$index] = $orders->sum('total_payment');
        }

        $data = [];
        array_push($data, [
            'days' => $dayOfMonth,
            'revenue' => $listRevenue,
        ]);

        return json_encode($data);
    }
}
