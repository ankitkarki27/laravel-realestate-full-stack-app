<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/',[FrontController::class,'index'])->name('home');
Route::get('/about',[FrontController::class,'about'])->name('about');

// //Admin once the admin is logged in admin middlware is used
Route::middleware('admin')->prefix('admin')->group(function(){
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin_dashboard');
});


Route::prefix('admin')->group(function(){
    Route::get('/login',[AdminController::class,'login'])->name('admin_login');
    Route::post('/login',[AdminController::class,'login_submit'])->name('admin_login_submit');
    Route::get('/forget-password',[AdminController::class,'forget_password'])->name('admin_forget_password');
    Route::post('/forget-password',[AdminController::class,'forget_password_submit'])->name('admin_forget_password_submit');
    Route::post('/reset-password/{token}/{email}',[AdminController::class,'reset_password'])->name('admin_reset_password');
    Route::get('/logout',[AdminController::class,'logout'])->name('admin_logout');
});

