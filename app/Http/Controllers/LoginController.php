<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Route Login
    public function index()
    {
        return view('/auth/login', [
            'title' => 'Login'
        ]);
    }

    // Route Login
    public function authenticate(Request $request)
    {
        // Validate the data
        $credential = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        // Check if the user exists
        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('error', 'Login Failed! Please Try Again');
    }

    // Route Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
