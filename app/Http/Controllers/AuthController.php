<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
  
    public function showRegister()
    {
        return view('register');
    }
    
  
    public function register(RegisterRequest $request)
    {
       
        $validated = $request->validated();

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login')->with('success', 'Kayıt başarılı! Şimdi giriş yapabilirsin.');
    }
    
   
    public function showLogin()
    {
        return view('login');
    }
    
   
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
           
            $request->session()->regenerate();
            
           
            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'email' => 'Girdiğiniz bilgiler hatalı.',
        ]);
    }

    
    public function logout(Request $request)
    {
        
        Auth::logout();

       
        $request->session()->invalidate();

        
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Başarıyla çıkış yapıldı.');
    }
}