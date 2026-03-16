<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{

    public function index()
    {
        return view('students.index');
    }

    public function store(Request $request)
    {
       User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role' => 'student',
      'grade' => $request->grade,
      'group' => $request->group,
      'rating' => $request->rating,
      'subscription_end' => now()->addMonth()
      ]);

        return redirect()->back()->with('success', 'تم إضافة الطالب');
    }
     
    public function dashboard(){

$user = auth()->user();

$watchedLessons = \DB::table('video_views')
->where('user_id',$user->id)
->count();

$quizCount = \DB::table('results')
->where('user_id',$user->id)
->count();

$points = \DB::table('results')
->where('user_id',$user->id)
->sum('score');


$rank = \DB::table('results')
->select('user_id', \DB::raw('SUM(score) as total'))
->groupBy('user_id')
->orderByDesc('total')
->pluck('user_id')
->search($user->id) + 1;


$totalLessons = \DB::table('lessons')->count();

$progress = $totalLessons ? round(($watchedLessons/$totalLessons)*100) : 0;


return view('students.dashboard',[
'watchedLessons'=>$watchedLessons,
'quizCount'=>$quizCount,
'points'=>$points,
'rank'=>$rank,
'progress'=>$progress
]);

}
}