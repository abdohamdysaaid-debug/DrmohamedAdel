<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
   public function store(LoginRequest $request)
{
    try {

        $request->authenticate();

        } catch (\Illuminate\Validation\ValidationException $e) {

        return response()->json([
            'error' => true
        ], 401);

     }

      $request->session()->regenerate();
     $user = auth()->user();

     if($user->role == 'student' && $user->subscription_end < now()){

      Auth::logout();
  
      return redirect('/login')->withErrors([
      'email' => 'انتهى اشتراكك برجاء تجديد الاشتراك'
       ]);

     }
     $user = auth()->user();

     if ($user->role == 'admin') {
      return response()->json([
        'redirect' => '/dashboard'
     ]);
    }

     if ($user->role == 'student') {
     return response()->json([
        'redirect' => '/student-dashboard'
     ]);
     }

     }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
