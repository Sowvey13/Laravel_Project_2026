<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

// Misafir Rotaları (Giriş yapmamış kullanıcılar)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Korumalı Rotalar (Sadece Giriş Yapmış Kullanıcılar)
Route::middleware(['auth'])->group(function () {
    

    Route::get('/home', [ProductController::class, 'index'])->name('home'); 
    
   
    Route::resource('products', ProductController::class)->except(['index', 'create', 'edit']);
    
    // Güvenli ve Kurumsal Çıkış Yapma Rotası
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::get('/auth-required', function () {
    return view('auth-required');
})->name('auth-required');