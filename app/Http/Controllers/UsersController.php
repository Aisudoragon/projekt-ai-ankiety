<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function admin()
    {
        return view('admin');
    }

    public function adminUsers()
    {
        $users = User::with('permission')->get();

        return view('admin-users', ['users' => $users]);
    }

    public function adminUser($id)
    {
        $user = User::find($id);

        return view('admin-edit-user', ['user' => $user]);
    }

    public function adminUserUpdate(Request $request)
    {
        $email = $request->input('email');
        $login = $request->input('login');
        $password = $request->input('password');
        $confirmPassword = $request->input('confirm_password');

        $user = User::find($request->input('id'));

        if ($email !== $user->email) {
            $existingUser = User::where('email', $email)->first();
            if ($existingUser) {
                return redirect()->back()->with('error', 'Email is already taken.');
            }

            $user->email = $email;
        }

        if ($login !== $user->login) {
            $existingUser = User::where('login', $login)->first();
            if ($existingUser) {
                return redirect()->back()->with('error', 'Login is already taken.');
            }

            $user->login = $login;
        }

        if (!empty($password) && $password == $confirmPassword) {
            $user->password = bcrypt($password);
        }

        $user->save();

        return redirect()->back()->with('success', 'User successfully updated.');
    }

    public function destroy($id = null)
    {
        if ($id) {
            $user = User::find($id);
            $user->delete();
            return redirect()->back()->with('success', 'Account successfully deleted.');
        } else {
            $user = User::find(Auth::id());
            $user->delete();
            return redirect()->route('index')->with('success', 'Account successfully deleted.');
        }
    }
}
