<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\VideoView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Lesson::create([

'title' => $request->title,
'video_url' => $request->video_url,
'year' => $request->year,
'chapter' => $request->chapter

]);

return redirect('/lessons');

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
use App\Models\Notification;

Notification::create([
'title'=>'درس جديد',
'message'=>'تم إضافة درس جديد على المنصة'
]);