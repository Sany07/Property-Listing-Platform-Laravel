<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'FrontEndController@index' )->name('index');
Route::get('/listings', 'FrontEndController@listings' )->name('listings');
Route::get('/listing/{id}', 'FrontEndController@listing' )->name('single.listing');
Route::get('/dashboard', 'FrontEndController@dashboard' )->name('dashboard');
Route::get('/about', 'FrontEndController@about' )->name('about');
Route::get('/query', 'searchController@search' )->name('search');
Route::get('/search', 'searchController@result' )->name('result');
Route::post('/contact', 'ContactController@store' )->name('send-message');




// 'middleware' => 'auth'
// ['middleware'=>'auth']
// isauthorize:0 -> 0 == admin
Route::group(['prefix' => 'back','middleware' => 'isauthorize:0'], function() {

    Route::get('/', 'AdminController@index' )->name('admin.index');
    Route::resource('listings', 'ListingController');
    Route::resource('realtors', 'RealtorController');
    Route::resource('users', 'UserController');
    Route::resource('som', 'SellerOftheMonth');
    Route::resource('inquiries', 'InquiryController');

});



    // Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    // Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    // Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    
    // Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    

