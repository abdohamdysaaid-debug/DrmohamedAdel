<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\StudentController;

Route::get('/add-quiz', [QuizController::class, 'create']);
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {

    $user = auth()->user();

    if($user->subscription_end && $user->subscription_end < now()){
        return "انتهى الاشتراك.. تواصل مع المدرس للتجديد";
    }

    return view('dashboard');

})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
use App\Http\Controllers\LessonController;

Route::get('/lessons', [LessonController::class,'index']);
Route::post('/lessons', [LessonController::class,'store']);
Route::get('/add-lesson', function () {
    return view('lessons.create');
});

Route::get('/add-quiz', function(){

$lessons = \App\Models\Lesson::all();

return view('quizzes.create',compact('lessons'));

});

Route::post('/quizzes', [QuizController::class,'store']);

Route::get('/quiz/{lesson_id}', [QuizController::class,'show']);

Route::post('/submit-quiz', [QuizController::class,'submit']);
use App\Http\Controllers\ResultController;

Route::get('/leaderboard',[ResultController::class,'leaderboard'])->middleware('auth');
Route::get('/admin', function(){

    if(!auth()->check()){
        return redirect('/login');
    }

    if(!auth()->user()->is_admin){
        return redirect('/dashboard');
    }

    return view('admin');

});
Route::get('/add-student', function(){
return view('students.create');
});

use App\Models\User;
use Illuminate\Http\Request;

Route::post('/add-student', function(Request $request){

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'year' => $request->year,
        'group' => $request->group,
        'role' => 'student'
    ]);

    return redirect('/admin');
});
Route::get('/students', function () {

    $students = User::where('role','student')->get();

    return view('students', compact('students'));

});
Route::get('/extend-subscription/{id}', function ($id) {

    $user = \App\Models\User::find($id);

    $user->subscription_end = now()->addMonth();

    $user->save();

    return redirect('/students');

});
Route::get('/delete-student/{id}', function($id){

    $student = \App\Models\User::find($id);

    $student->delete();

    return redirect('/students');

});
Route::get('/edit-student/{id}', function($id){

    $student = \App\Models\User::find($id);

    return view('edit-student', compact('student'));

});
Route::post('/update-student/{id}', function(\Illuminate\Http\Request $request,$id){

    $student = \App\Models\User::find($id);

    $student->year = $request->year;
    $student->group = $request->group;
    $student->rating = $request->rating;

    $student->save();

    return redirect('/students');

 });
 Route::middleware(['auth','admin'])->group(function(){

 Route::get('/teacher-dashboard',[ResultController::class,'teacherDashboard']);

 Route::get('/video-report',[ResultController::class,'videoWatchReport']);

 Route::get('/add-lesson',function(){
 return view('lessons.create');
 });
 

 Route::post('/students/add', [StudentController::class, 'store'])->name('students.add');
 Route::get('/students', [StudentController::class, 'index'])->name('students.index');

 Route::post('/renew/{id}', function($id){

$user = App\Models\User::find($id);

$user->subscription_end = now()->addMonth();

$user->save();

return redirect('/students');

}); 

Route::post('/students/delete/{id}', function($id){

\App\Models\User::find($id)->delete();

return redirect('/students');

});
});

Route::get('/student-dashboard', function () {
    return view('student.dashboard');
})->middleware('auth');