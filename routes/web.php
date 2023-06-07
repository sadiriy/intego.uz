<?php

use App\Http\Controllers\Admin\CalculationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PriceListRequestController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\ParameterController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\MainPageController;
use App\Http\Controllers\Front\CartController;
use App\Mail\NewOrder;
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

Route::get('/', [\App\Http\Controllers\Front\MainPageController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/category/{category_id}', [App\Http\Controllers\Front\ProductController::class, 'index'])->name('front_products.index');

Route::get('/about-us', 'App\Http\Controllers\Admin\PageController@about')->name('about');

Route::get('/certificates', 'App\Http\Controllers\Admin\CertificatesController@index');

Route::get('/certificate/{certificate}', 'App\Http\Controllers\Admin\CertificatesController@single')->name('single.certificate');;

Route::get('/reviews', 'App\Http\Controllers\Admin\OverviewsController@index');

Route::get('/contacts', 'App\Http\Controllers\Admin\PageController@contacts')->name('contacts');

Route::get('/partners', 'App\Http\Controllers\Admin\PageController@partners')->name('partners');

Route::post('/cart/add', 'App\Http\Controllers\Front\CartController@store')->name('cart.store');

Route::get('/cart', 'App\Http\Controllers\Front\CartController@index')->name('cart.index');

Route::delete('/cart/destroy/{id}', 'App\Http\Controllers\Front\CartController@destroy')->name('cart.remove');

Route::get('empty', 'App\Http\Controllers\Front\CartController@clear')->name('cart.clear');

Route::post('/cart/send', 'App\Http\Controllers\Front\CartController@send')->name('cart.send');

Route::post('/send-form', [\App\Http\Controllers\Front\MainPageController::class, 'priceList'])->name('priceList');

Route::post('/calculation', 'App\Http\Controllers\Front\MainPageController@calculation')->name('index.calculation');

Route::get('/email', function(){
    return new NewOrder();
});


Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin', function () {
        return view('back/index');
    });

    Route::resource('admin/categories', CategoryController::class);
    Route::resource('admin/products', ProductController::class);
    Route::get('admin/products/{product}/duplicate', 'App\Http\Controllers\Admin\ProductController@duplicate')->name('product.duplicate');
    Route::POST('admin/products/search', 'App\Http\Controllers\Admin\ProductController@search')->name('product.search');
    Route::resource('admin/attributes', AttributeController::class);
    Route::resource('admin/{product}/parameters', ParameterController::class);
    Route::resource('admin/pages', PageController::class);
    Route::get('admin/certificates', 'App\Http\Controllers\Admin\CertificatesController@list')->name('certificates.admin');
    Route::post('admin/certificates/add', 'App\Http\Controllers\Admin\CertificatesController@upload')->name('certificates.upload');
    Route::delete('admin/certificates/delete/{certificate}', 'App\Http\Controllers\Admin\CertificatesController@delete')->name('certificates.delete');
    Route::get('admin/certificates/{certificate}/images', 'App\Http\Controllers\Admin\CertificateImagesController@index')->name('certificateImages.admin');
    Route::post('admin/certificates/{certificate}/images/add', 'App\Http\Controllers\Admin\CertificateImagesController@upload')->name('certificateImages.upload');
    Route::delete('admin/certificates/images/delete/{certificateImage}', 'App\Http\Controllers\Admin\CertificateImagesController@delete')->name('certificateImages.delete');
    Route::get('admin/overviews', 'App\Http\Controllers\Admin\OverviewsController@list')->name('overviews.admin');
    Route::post('admin/overviews/add', 'App\Http\Controllers\Admin\OverviewsController@upload')->name('overviews.upload');
    Route::delete('admin/overviews/delete/{overview}', 'App\Http\Controllers\Admin\OverviewsController@delete')->name('overviews.delete');
    Route::get('admin/partners', 'App\Http\Controllers\Admin\PartnersController@index')->name('partners.index');
    Route::post('admin/partners/add', 'App\Http\Controllers\Admin\PartnersController@upload')->name('partners.upload');
    Route::delete('admin/partners/delete/{partner}', 'App\Http\Controllers\Admin\PartnersController@delete')->name('partners.delete');
    Route::get('admin/orders', 'App\Http\Controllers\Admin\OrdersController@index')->name('orders.index');
    Route::get('admin/orders/{order}/activate', 'App\Http\Controllers\Admin\OrdersController@activate')->name('orders.activate');
    Route::get('admin/orders/{order}', 'App\Http\Controllers\Admin\SingleOrderController@index')->name('order.index');
    Route::get('admin/settings', function (){
        return view('back/settings');
    })->name('settings.index');
    Route::resource('admin/settings/sliders', SliderController::class);
    Route::get('admin/settings/sliders/change-to-video/{slider}', 'App\Http\Controllers\Admin\SliderController@isVideo')->name('sliders.is_video');
    Route::resource('admin/settings/mainpage', MainPageController::class);
    Route::resource('admin/settings/general', GeneralSettingsController::class);

    Route::resource('admin/calculations', CalculationController::class);
    Route::get('admin/calculations/{calculation}/activate', 'App\Http\Controllers\Admin\CalculationController@activate')->name('calculation.activate');

    Route::resource('admin/priceListRequests', PriceListRequestController::class);
    Route::get('admin/priceListRequests/{priceListRequest}/activate', 'App\Http\Controllers\Admin\PriceListRequestController@activate')->name('priceListRequest.activate');

});

Auth::routes();
