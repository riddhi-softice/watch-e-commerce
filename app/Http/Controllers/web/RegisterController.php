<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // session(['user_id' => $user->id]);
        Auth::login($user);  // Set authenticated session
        
        return redirect()->back()->with('success', 'Registration successful!');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        // dd([
        //     'credentials' => $request->only('email', 'password'),
        //     'user_exists' => User::where('email', $request->email)->exists(),
        //     'stored_password' => optional(User::where('email', $request->email)->first())->password,
        //     'login_result' => Auth::attempt($request->only('email', 'password'))
        // ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // session(['user_id' => $user->id]);
            return redirect()->back()->with('success', 'Login successful!');
        }
        return back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back()->with('success', 'Logged out successfully.');
    }

}