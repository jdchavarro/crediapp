<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('login');

Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::resource('product', ProductController::class)->middleware('auth');
Route::resource('user', UserController::class)->middleware('auth');
Route::resource('client', ClientController::class)->middleware('auth');
Route::resource('credit', CreditController::class)->middleware('auth');
Route::resource('payment', PaymentController::class)->middleware('auth');
