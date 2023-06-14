<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('profile', ['user' => $user]);
    }

    public function updateEmail(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'email' => 'required|unique:users|email|max:255',
        ]);

        $user->email = $validatedData['email'];
        /** @var \App\Models\User $user */ // Ten komentarz jest tylko po to, żeby IDE nie podkreślało $user->save() na czerwono
        $user->save();

        return redirect()->intended('/profile')->with('success', 'E-mail successfully changed.');
    }

    public function updateLogin(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'login' => 'required|unique:users|alpha_dash|max:255',
        ]);

        $user->login = $validatedData['login'];
        /** @var \App\Models\User $user */ // Ten komentarz jest tylko po to, żeby IDE nie podkreślało $user->save() na czerwono
        $user->save();

        return redirect()->intended('/profile')->with('success', 'Login successfully changed.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'previous_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();
        if (!Hash::check($request->previous_password, $user->password)) {
            return redirect()->back()->with('error', 'Old password is incorrect.');
        }

        $user->password = Hash::make($request->new_password);
        /** @var \App\Models\User $user */ // Ten komentarz jest tylko po to, żeby IDE nie podkreślało $user->save() na czerwono
        $user->save();

        return redirect()->back()->with('success', 'Password successfully changed.');
    }
}
