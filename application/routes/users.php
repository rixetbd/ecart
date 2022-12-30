<?php

use App\Http\Controllers\Frontend\MainController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::controller(MainController::class)->group(function(){

});

// Frontend Users
Route::controller(UserController::class)->prefix('user')->group(function(){
    Route::get('/login', 'login')->name('frontend.user.login');
    Route::get('/register', 'register')->name('frontend.user.register');
    Route::post('/userlogin', 'userlogin')->name('frontend.user.userlogin');
    Route::post('/userregister', 'userregister')->name('frontend.user.userregister');
    Route::get('/customerlogout', 'customerlogout')->name('frontend.user.customerlogout');
});


Route::controller(UserController::class)->middleware('CustomerAuth')->prefix('user')->group(function(){
    Route::get('/dashboard', 'dashboard')->name('frontend.user.dashboard');
    Route::get('/profile', 'profile')->name('frontend.user.profile');
});
