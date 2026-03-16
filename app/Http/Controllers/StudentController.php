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

}