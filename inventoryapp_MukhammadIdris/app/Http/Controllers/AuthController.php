<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function formregister()
    {
        return view('auth.register');

    }

public function register(Request $request)
{

        //Validation    
        $request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|string|email|max:255|unique:users,email',
    'password' => 'required|string|min:6|confirmed',
    ]);

         $userCount = User::count();
         if($userCount == 0 ){
            $userCount = "admin";
         }else{
            $userCount = "staff";
         }
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $userCount
        ]);

        return redirect()->route('login');
    }

    public function formlogin()
    {
        return view('auth.login');
    }
    public function login(Request $request){
        // Validation
    $credentials = $request->validate([
    'email' => 'required|string|email',
    'password' => 'required',
    ]);
     if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'email' => 'Email atau Password Belum Terdaftar!',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/login');
}
}


