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
    return view('site.layouts.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix' => 'admin', ], function() {
    // Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    // Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    // Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    
    // Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    
    Route::get('/', function () {
        return view('site.layouts.index');
    });
    Route::get('/s', 'AdminController@index')->name('admin.dashboard');
    
    
    Route::resource('realtor', 'RealtorController');
});