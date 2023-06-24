<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
        return redirect()->back()->withErrors(['message' => 'Invalid login or password']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'login' => 'required|unique:users|max:20|min:3|alpha_dash',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|confirmed|min:8|max:20|alpha_num',
        ], [
            'login.required' => 'Login field is required.',
            'login.unique' => 'Login already exists.',
            'login.max' => 'Login must be at most 20 characters long.',
            'login.min' => 'Login must be at least 3 characters long.',
            'login.alpha_dash' => 'Login must contain only alphanumeric characters, dashes, and underscores.',
            'email.required' => 'Email field is required.',
            'email.unique' => 'Email already exists.',
            'email.email' => 'Invalid email address.',
            'email.max' => 'Email must be at most 255 characters long.',
            'password.required' => 'Password field is required.',
            'password.confirmed' => 'Passwords do not match.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.max' => 'Password must be at most 20 characters long.',
            'password.alpha_num' => 'Password must contain only alphanumeric characters.',
        ]);

        $user = User::create([
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('index')->with('success', 'The account has been created successfully');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
