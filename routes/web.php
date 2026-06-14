<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Giriş ve Kayıt İşlemleri
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


Route::get('/auth-required', function () {
    return view('auth-required');
})->name('auth-required');


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [ProductController::class, 'index']); 
    
    Route::get('/products', [ProductController::class, 'indexAll']); 
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{product}', [ProductController::class, 'show']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->middleware('auth');