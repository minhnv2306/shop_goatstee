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

    Route::resource('product', 'ProductController');
    Route::resource('users', 'UserController');
    Route::resource('categories-site', 'CategoryController');

    Route::get('getProducts/{categoryId}/{count}', 'CategoryController@getProducts');
    Route::post('getColors', 'ProductController@getColors')->name('ajax.get-color');
    Route::post('getSizes', 'ProductController@getSizes')->name('ajax.get-size');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/', 'HomeController@index')->name('admin.index');
        Route::resource('users-admin', 'UserController');
        Route::resource('products', 'ProductController');
        Route::resource('orders', 'OrderController');
        Route::resource('reviews', 'ReViewController');
        Route::resource('categories', 'CategoryController');
        Route::resource('colors', 'ColorController');
        Route::resource('sizes', 'SizeController');

        Route::get('get-size-of-category/{categoryId}', 'SizeController@getSizeOfCategory')->name('ajax.get-size');
        Route::get('add-product/{categoryId}', 'ProductController@addProduct')->name('ajax.add-product');
        Route::get('/serverSide', 'ProductController@ajaxServerDataTable')->name('datatable.server-side');
    });
    Route::get('/login', 'HomeController@login');
    Route::get('/logout', 'UserController@logout')->name('admin.logout');
    Route::post('/login', 'UserController@checkLoginAdmin')->name('admin.login');
});

Auth::routes();
