<?php

namespace App\Http\Controllers\web;

use App\Http\Requests\SignupRequestValidator;
use App\Http\Requests\LoginRequestValidator;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    // signup form get
    public function showSignupForm()
    {
        return view('auth.signup', ['title' => 'Signup Page']);
    }

    // signup post 
    public function signup(SignupRequestValidator $request)
    {
        // Validate request
        $validated = $request->validated();

        // Create user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);
        $user->save();

        // Login
        Auth::login($user);

        return redirect('/')->with('success', 'Account created and logged in successfully.');
    }

    // lgoin form get
    public function showLoginForm()
    {
        return view('auth.login', ['title' => 'Login Page']);

    }


    // login post
    public function login(LoginRequestValidator $request)
    {
        $validated = $request->validated();

        // Attempt to login
        $credentials = ['email' => $validated['email'], 'password' => $validated['password']];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', 'Hello ' . Auth::user()->name . ', You Have Logged in successfully.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // logout post 
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();   // Destroys session data completely
        $request->session()->regenerateToken(); // Generates a fresh CSRF token

        return redirect('/')->with('success', 'Logged out successfully.');
    }

}
