<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware'=>'guest'],function(){
    Route::get('/',[AuthController::class,'index'])->name('home');
    Route::post('/login',[AuthController::class,'login'])->name('login')->middleware('throttle:2,5');
    Route::get('/register_view',[AuthController::class,'register_view'])->name('register_view');
    Route::post('/register',[AuthController::class,'register'])->name('register')->middleware('throttle:2,5');
    Route::get('/forget_password',[AuthController::class,'forget_password'])->name('forget_password');
    Route::post('/forget_password_post',[AuthController::class,'forget_passwordPost'])->name('forget_password.post')->middleware('throttle:2,5');

    Route::get('/reset_password/{token}',[AuthController::class,'reset_password'])->name('reset_password');
    Route::post('/reset_passwordPost',[AuthController::class,'reset_passwordPost'])->name('reset_password.post');
});

// route for authenticated users

Route::group(['middleware'=>'auth'],function(){
Route::get('/dashboard',[AuthController::class,'home'])->name('dashboard');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::controller(AccountController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});
  
});

// Route::controller(AccountController::class)->group(function(){
//     Route::get('stripe', 'stripe');
//     Route::post('stripe', 'stripePost')->name('stripe.post');
// });




