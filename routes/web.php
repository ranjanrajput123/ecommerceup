<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;





Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/', function () {
    return view('index');
})->name('home');

// Route::get('login', function () {
//     return view('admin-panel.login');
// })->name('admin.login');
// Route::get('register', function () {
//     return view('admin-panel.register');
// })->name('admin.register');

// Route::get('dashboard', function () {
//     return view('admin-panel.dashboard');
// })->name('admin.dashboard');
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->middleware('auth:admin')->name('admin.dashboard');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});



Route::get('/shop', function () {
    return view('shop');
})->name('shop');

Route::get('/shopdetails', function () {
    return view('shopdetails');
})->name('shopdetails');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/shopdetails', function () {
    return view('shopdetails');
})->name('shopdetails');

Route::get('/testimonial', function () {
    return view('testimonial');
})->name('testimonial');

Route::get('/contect', function () {
    return view('contect');
})->name('contect');

Route::get('/404', function () {
    return view('404');
})->name('404');

