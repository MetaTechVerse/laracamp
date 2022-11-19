<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('index');
})->name('index');

// Route::get('login', function () {
//     return view('auth.user.login');
// });

Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/goggle/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');

Route::get('dashboard', function () {
    return view('user.dashboard');
})->name('dashboard');

Route::get('checkout', function () {
    return view('checkout.create');
})->name('checkout');

Route::get('success-checkout', function () {
    return view('checkout.success');
})->name('success-checkout');

require __DIR__.'/auth.php';
