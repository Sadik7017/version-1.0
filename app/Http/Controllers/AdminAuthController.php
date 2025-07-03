<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
//     public function __construct()
// {
//     $this->middleware('guest:admin')->except(['logout', 'dashboard']);
// }

//     public function __construct()
// {
//     $this->middleware('guest:admin')->except(['logout', 'dashboard']);
// }

   public function showLoginForm()
{
    
    if (Auth::guard('admin')->check()) {
        // dd('ijgi');
        return redirect()->route('admin.dashboard');
    }
    return view('admin.auth.login');
}


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid credentials');
    }

  public function logout()
{
    Auth::guard('admin')->logout();        // Logout the admin
    session()->invalidate();               // Invalidate session
    session()->regenerateToken();          // Regenerate CSRF token
    return redirect()->route('admin.login')->with('message', 'Logged out successfully');
}


    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
