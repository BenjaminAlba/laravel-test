<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.landing');
})->name('landing');

Route::controller(LoginController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

Route::group(['middleware' => 'checkrole:administrador'], function () {
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin-dashboard');
});

Route::group(['middleware' => 'checkrole:proveedor'], function () {
    Route::get('/provider-dashboard', [ProviderController::class, 'index'])->name('provider-dashboard');
});

Route::group(['middleware' => 'checkrole:usuario'], function () {
    Route::get('/user-dashboard', [UserController::class, 'index'])->name('user-dashboard');
});