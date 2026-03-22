<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function signUp()
    {
        return view('auth.register');
    }

public function register(Request $request)
{
    $credentials = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required',
        'date_of_birth' => 'required|date',
        'gender' => 'required',
        'profile_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        'target_band_score' => 'required',
        'address' => 'nullable',
        'password' => 'required|string|min:8|confirmed',
    ]);

    if ($request->hasFile('profile_image')) {
        $path = $request->file('profile_image')->store('profile_image', 'public');
        $credentials['profile_image'] = $path;
    }

    $credentials['password'] = Hash::make($request->password);

    $user = User::create($credentials);

    $user->assignRole('user');

    return redirect()->route('signIn');
}

    public function signIn()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->hasRole('admin')) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('user.index');
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
