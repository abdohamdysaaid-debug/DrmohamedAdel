<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function send()
    {
        Notification::create([
            'user_id' => 5, // غيرها حسب الطالب
            'title' => 'كويز جديد 🔥',
            'message' => 'تم إضافة كويز جديد لك'
        ]);

        return response()->json(['status' => 'done']);
    }

    public function get()
    {
        return Notification::where('user_id', auth()->id())
            ->latest()
            ->get();
    }
}