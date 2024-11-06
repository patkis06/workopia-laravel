<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('pages.auth.login');
    }

    public function authozize(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|string|email|max:100',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate user
        if (Auth::attempt($credentials)) {
            // Regenerate the session to prevent fixation attacks
            $request->session()->regenerate();

            return redirect()->intended(route('home'))->with('success', 'You are now logged in!');
        }

        // If auth fails, redirect back with error
        return back()->withErrors([
            'email' => 'The provided credentials do not match. '
        ])->onlyInput('email');
    }

    public function register(): View
    {
        return view('pages.auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Hash password
        $data['password'] = Hash::make($data['password']);

        // Create user
        $user = User::create($data);

        return redirect()->route('login')->with('success', 'You are registered!');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
