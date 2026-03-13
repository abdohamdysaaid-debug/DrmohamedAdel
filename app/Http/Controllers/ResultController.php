<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\User;

class ResultController extends Controller
{

public function leaderboard()
{
$results = \App\Models\Result::with('user')
->orderBy('score','desc')
->get();

return view('leaderboard',compact('results'));
}
public function teacherDashboard()
{

$students = \App\Models\User::where('role','student')->count();

$lessons = \App\Models\Lesson::count();

$quizzes = \App\Models\Quiz::count();

$views = \App\Models\VideoView::count();

$topStudents = \App\Models\User::orderBy('rating','desc')
->take(5)
->get();

return view('teacher-dashboard',compact(
'students',
'lessons',
'quizzes',
'views',
'topStudents'
));

}
public function videoWatchReport()
{

$students = \App\Models\User::where('role','student')->get();

$lessons = \App\Models\Lesson::all();

return view('video-report',compact('students','lessons'));

}

}