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

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/password_recovery', function () {
    return view('auth.pwd_recover');
})->name('pwd_recovery');

Route::get('/signup', function () {
    return view('auth.register');
})->name('signup');

Route::post('userRegister', 'Auth\RegisterController@userRegister')->name('newuserregister');
Route::post('forgot_pwd_mail', 'EmailController@forgot_pwd_mail')->name('forgot_pwd_mail');

Auth::routes(['verify' => true]);
Route::group(['middleware' => ['auth']], function () {
    Route::redirect('/', 'dashboard');
    Route::get('/dashboard', 'BlogController@index')->name('dashboard');
        Route::resource('adminProfile', 'EmailController');

        //Blog resource
        Route::post('blogs/switchUpdate', 'BlogController@switchUpdate')->name('blogs.switchUpdate');
        Route::resource('blogs', 'BlogController');
});
