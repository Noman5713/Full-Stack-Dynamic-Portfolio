<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login( Request $request)
    {
       // echo "This is login controller";

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->route('admin.dashboard');
        }
        else{
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }


       // echo $request->email;
       // echo $request->password;
    }


    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|',
            'email' => 'required|min:8',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' =>$request-> name,
            'email' => $request->email,
            //'name' => $validated['name'],
            //'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        if ($user) {
            Auth::login($user);
            return redirect()->route('admin.dashboard')->with('success', 'Registration successful! Welcome to your portfolio admin panel.');
        } else {
            return redirect()->route('register')->with('error', 'Registration failed. Please try again.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }
}
