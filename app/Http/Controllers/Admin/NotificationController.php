<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use DB;

class NotificationController extends Controller
{
    public function readAt($id)
    {
        $notification = Notification::where('id', $id)->first();
        $data = json_decode($notification->data);
        if ($notification->read_at == null) {
            $notification->update([
                'read_at' => now(),
            ]);
        }

        return redirect()->route('admin.orders.show', $data->order_id);
    }
}
