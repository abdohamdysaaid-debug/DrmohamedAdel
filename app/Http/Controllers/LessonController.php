<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\VideoView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Minishlink\WebPush\WebPush;

class LessonController extends Controller
{

public function index()
{

$lessons = Lesson::all();

if($lessons->count() > 0){

VideoView::updateOrCreate(

[
'user_id'=>Auth::id(),
'lesson_id'=>$lessons->first()->id
],

[
'watched'=>true
]

);

}

return view('lessons.index', compact('lessons'));

}



public function store(Request $request)
{
    // حفظ الدرس
    $lesson = Lesson::create([
        'title' => $request->title
    ]);

    // إرسال إشعار لكل الطلاب
    $users = User::all();

    $webPush = new WebPush();

    foreach ($users as $user) {
        if ($user->push_subscription) {
            $webPush->sendNotification(
                $user->push_subscription,
                json_encode([
                    'title' => '📚 درس جديد',
                    'body' => 'تم إضافة درس جديد: ' . $lesson->title
                ])
            );
        }
    }

    return back()->with('success', 'تم إضافة الدرس');
}
}
if($request->hasFile('pdf')){
    $pdf = $request->file('pdf')->store('pdfs','public');
}

Lesson::create([
    'title'=>$request->title,
    'video_url'=>$request->video_url,
    'chapter'=>$request->chapter,
    'pdf'=>$pdf ?? null
]);
