<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getNoti()
    {
        $noti = AdminNotification::all();
        return response()->json(['noti' => $noti]);
    }
    
    public function readNoti($id)
    {
        AdminNotification::withoutGlobalScope('adminNotify')->findOrFail($id)->update([
            'is_read' => 1,
        ]);
        // $noti = AdminNotification::all();

        return response()->noContent();
    }
    
    public function removeNoti($id)
    {
        AdminNotification::withoutGlobalScope('adminNotify')->findOrFail($id)->delete();
        // $noti = AdminNotification::all();

        return response()->noContent();
    }
}
