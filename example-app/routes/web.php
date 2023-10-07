<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('auth.landing');
})->name('landing');

//Login
Route::controller(LoginController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

Route::group(['middleware' => 'checkrole:administrador'], function () {
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin-dashboard');
    //Products
    Route::get('/admin-dashboard/product/list', [ProductoController::class, 'adminIndex'])->name('admin-products');
    Route::post('/admin-dashboard/product/create', [ProductoController::class, 'create'])->name('admin-products.create');
    Route::get('/admin-dashboard/product/edit/{producto}', [ProductoController::class, 'edit'])->name('admin-products.edit');
    Route::put('/admin-dashboard/product/update/{producto}', [ProductoController::class, 'update'])->name('admin-products.update');
    Route::delete('/admin-dashboard/product/delete/{producto}', [ProductoController::class, 'delete'])->name('admin-products.delete');
});

Route::group(['middleware' => 'checkrole:proveedor'], function () {
    Route::get('/provider-dashboard', [ProviderController::class, 'index'])->name('provider-dashboard');
    //Products
    Route::get('/provider-dashboard/product/list', [ProductoController::class, 'providerIndex'])->name('provider-products');
    Route::post('/provider-dashboard/product/create', [ProductoController::class, 'create'])->name('provider-products.create');
    Route::get('/provider-dashboard/product/edit/{producto}', [ProductoController::class, 'edit'])->name('provider-products.edit');
    Route::put('/provider-dashboard/product/update/{producto}', [ProductoController::class, 'update'])->name('provider-products.update');
    Route::delete('/provider-dashboard/product/delete/{producto}', [ProductoController::class, 'delete'])->name('provider-products.delete');
});

Route::group(['middleware' => 'checkrole:usuario'], function () {
    Route::get('/user-dashboard', [UserController::class, 'index'])->name('user-dashboard');
});