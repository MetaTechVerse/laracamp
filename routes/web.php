<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('index');
})->name('index');

// Route::get('login', function () {
//     return view('auth.user.login');
// });

Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::get('checkout/{camp:slug}', function () {
//     return view('checkout.create');
// })->name('checkout');

// Route::get('success-checkout', function () {
//     return view('checkout.success');
// })->name('success-checkout');

Route::middleware('auth')->group(function () {
    Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});

require __DIR__.'/auth.php';
