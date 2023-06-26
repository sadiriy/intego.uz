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
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['namespace' => 'App\Http\Controllers\Front'], function () {
    Route::get('/', 'MainPageController@index');
    Route::get('/category/{category}', 'CategoryController@index')->name('front.category.index');
    Route::get('/product/{product}', 'ProductController@index')->name('front.product.index');
    Route::get('/pages/{page}', 'MainPageController@page')->name('front.page');

    Route::group(['prefix' => 'cart'], function () {
        Route::get('/', 'CartController@index')->name('cart.index');
        Route::post('/add', 'CartController@store')->name('cart.store');
        Route::delete('/destroy/{id}', 'CartController@destroy')->name('cart.remove');
        Route::get('/empty', 'CartController@clear')->name('cart.clear');
        Route::post('/send', 'CartController@send')->name('cart.send');
    });

});

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('/', function () {return view('back/index');});

    Route::resource('/categories', 'CategoryController');
    Route::resource('/products', 'ProductController');
    Route::resource('/settings/sliders', 'SliderController');
    Route::resource('/settings/mainpage', 'MainPageController');
    Route::resource('/settings/general', 'GeneralSettingsController');


    Route::group(['prefix' => 'products'], function () {
        Route::get('/{product}/duplicate', 'ProductController@duplicate')->name('product.duplicate');
        Route::POST('/search', 'ProductController@search')->name('product.search');
    });

    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', 'OrderController@index')->name('orders.index');
        Route::get('/{order}/activate', 'OrderController@activate')->name('orders.activate');
        Route::get('/{order}', 'OrderProductController@index')->name('order.index');
    });

    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', function () {return view('back/settings');})->name('settings.index');
        Route::get('/sliders/change-to-video/{slider}', 'SliderController@isVideo')->name('sliders.is_video');
    });

    Route::resource('/attributes', 'AttributeController');
    Route::resource('/{product}/parameters', 'ParameterController');

    Route::resource('/pages', 'PageController');
    Route::get('/pages/{page}', 'PageController@singlePage')->name('back.page');
    Route::get('/pages/create', 'PageController@create')->name('back.page.create');
});

Auth::routes();
