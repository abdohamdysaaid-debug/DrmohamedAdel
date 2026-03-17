<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use Minishlink\WebPush\WebPush;

class ResultController extends Controller
{
    public function leaderboard()
    {
        $results = Result::with('user')
            ->orderBy('score', 'desc')
            ->get();

        return view('leaderboard', compact('results'));
    }

    public function submitResultNotification($user_id)
    {
        $user = User::find($user_id);

        // إشعار داخل المنصة
        Notification::create([
            'user_id' => $user->id,
            'title' => '📊 نتيجتك ظهرت',
            'message' => 'تم إعلان نتيجتك في الكويز'
        ]);

        // Push Notification
        if ($user->push_subscription) {

            $webPush = new WebPush();

            $webPush->sendNotification(
                $user->push_subscription,
                json_encode([
                    'title' => '📊 نتيجتك ظهرت',
                    'body' => 'تم إعلان نتيجتك في الكويز'
                ])
            );
        }
    }
}