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

Auth::routes();


Route::get('/', function () { 
    return view('site.layouts.index');
});

Route::get('/about', 'FrontEndController@about' )->name('about');





Route::group(['prefix' => 'admin', ], function() {
    Route::get('/dashboard', 'AdminController@index' )->name('admin.index');
        
    Route::resource('realtors', 'RealtorController');
});



    // Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    // Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    // Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    
    // Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    