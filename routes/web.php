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



Route::get('/', 'FrontEndController@index' )->name('index');
Route::get('/listings', 'FrontEndController@listings' )->name('listings');
Route::get('/listing/{id}', 'FrontEndController@listing' )->name('single.listing');
Route::get('/about', 'FrontEndController@about' )->name('about');



// , 'middleware' => 'auth'

Route::group(['prefix' => 'admin'], function() {

    Route::get('index', 'AdminController@index' )->name('admin.index');
    Route::resource('listings', 'ListingController');
    Route::resource('realtors', 'RealtorController');
    Route::resource('som', 'SellerOftheMonth');

});



    // Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    // Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    // Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    
    // Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    

