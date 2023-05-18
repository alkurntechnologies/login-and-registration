<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function(){
    return redirect('/home');
});

//login/register
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login.submit');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/signup', 'Auth\RegisterController@showSignupForm')->name('signup');
Route::post('/signup', 'Auth\RegisterController@register')->name('register.submit');
Route::get('verify-user/{token}', 'Auth\RegisterController@verify_user');
Route::get('send-verification-mail/{email}','Auth\RegisterController@sendVerificationMail');

//forget password
Route::get('/forgot-password', function () {return view('auth.forgot-password');});
Route::post('/forgot-password', 'Auth\LoginController@forgetPassword');
Route::get('/password/reset/{token}', function ($token) {
    return view('auth.new-password')->with(['token' => $token]);
});
Route::post('/password/reset/{token}', 'Auth\LoginController@updateForgotPassword');

//after login

Route::middleware('auth')->group(function () {

    Route::get('/notifications', 'UserController@notifications');
    
    Route::get('/change-password', function () {return view('front-user.common.change-password');});
    Route::post('/change-password', 'UserController@changePassword');

    Route::get('/my-profile', function () {return view('front-user.common.my-profile');});
    Route::post('/my-profile', 'UserController@updateProfile');

});

Route::get('/{slug?}', 'HomeController@cms');