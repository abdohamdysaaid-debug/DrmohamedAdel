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
        $students = User::where('role','student')->get();

      foreach($students as $student){
        Notification::create([
        'user_id'=>$student->id,
        'title'=>'📊 نتيجة جديدة',
        'message'=>'تم إعلان نتيجة الكويز'
         ]);
        }

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