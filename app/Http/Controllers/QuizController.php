<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    //
   
public function store(Request $request)
{

    Quiz::create([
        'lesson_id'=>$request->lesson_id,
        'question'=>$request->question,
        'option1'=>$request->option1,
        'option2'=>$request->option2,
        'option3'=>$request->option3,
        'option4'=>$request->option4,
        'correct_answer'=>$request->correct_answer
    ]);

    return redirect('/dashboard');

}

public function index(Request $request)
{

$lesson_id = $request->lesson_id;

$exists = \App\Models\Result::where('user_id', auth()->id())
->where('lesson_id', $lesson_id)
->exists();

if($exists){

return redirect('/leaderboard')->with('message','لقد قمت بحل هذا الاختبار بالفعل');

}

$quizzes = Quiz::where('lesson_id',$lesson_id)->get();

return view('quiz',compact('quizzes','lesson_id'));

}

public function show($lesson_id)
{

$exists = \App\Models\Result::where('user_id', auth()->id())
->where('lesson_id', $lesson_id)
->exists();

if($exists){

return redirect('/lessons')
->with('error','لقد قمت بحل هذا الاختبار بالفعل');

}

$quizzes = Quiz::where('lesson_id',$lesson_id)->get();

return view('quiz',compact('quizzes','lesson_id'));

}

public function submit(Request $request)
{
    $score = 0;

    foreach($request->answers as $quiz_id => $answer){

        $quiz = Quiz::find($quiz_id);

        if($quiz->correct_answer == $answer){
            $score++;
        }

    }

    Result::create([
        'user_id'=>Auth::id(),
        'lesson_id'=>$request->lesson_id,
        'score'=>$score
    ]);

    return redirect('/leaderboard');
}
}
