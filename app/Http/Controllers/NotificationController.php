<?php

namespace App\Http\Controllers;

use App\Models\Notification;

class NotificationController extends Controller
{

public function sendManual(){

Notification::create([
'user_id'=>5,
'title'=>'رسالة خاصة',
'message'=>'تم إضافة واجب لك'
]);

return "تم إرسال الإشعار";

}

}