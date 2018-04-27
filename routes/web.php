<?php

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
Route::group([ 'namespace' => 'Sites'], function() {
    Route::get('/', 'HomeController@home')->name('sites.home');
    Route::get('/about-us', 'HomeController@aboutUs')->name('sites.about-us');
    Route::get('search', 'ProductController@search');
    Route::get('my-cart', 'ProductController@cart')->name('sites.cart');
    Route::get('contact-us', 'HomeController@contact')->name('sites.contact');
    Route::get('size-chart', 'HomeController@sizeChart')->name('sites.size-chart');
    Route::get('my-account', 'UserController@showAccount')->name('sites.my-account');
    Route::get('order', 'ProductController@order')->name('sites.order');
    Route::get('faqs', 'HomeController@faqs')->name('sites.faqs');

    Route::resource('products', 'ProductController');
    Route::resource('users', 'UserController');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'HomeController@index');
    Route::resource('users-admin', 'UserController');
    Route::resource('products', 'ProductController');
    Route::resource('orders', 'OrderController');
    Route::resource('reviews', 'ReViewController');
});

Auth::routes();
