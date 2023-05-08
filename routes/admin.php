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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();


Route::get('/', 'DashboardController@index')->name('dashboard.index');

Route::get('admin/nested-user', 'UserController@getNestedUsers')->name('admin.api.nestedUsers');



Route::get('admin/nested-user/list/{parentId}', 'UserController@getNestedUserList')->name('admin.api.nestedUsersList');
Route::get('admin/nested-user/list/users/{id}', 'UserController@show')->name('users.show');;


Route::get('admin/nested-user/api/{id}', 'UserController@getUserHierarchy')->name('admin.api.nestedUsers.api');


Route::post('admin/user/status/active/{id}', 'UserController@updateStatusAsActive')->name('admin.api.status.update.active');
Route::post('admin/user/status/passive/{id}', 'UserController@updateStatusAsPassive')->name('admin.api.status.update.passive');
Route::post('admin/user/seller/{id}', 'UserController@updateUserAsSeller')->name('admin.api.status.update.seller');



Route::post('api/admin', 'AdminController@api')->name('admin.api');
Route::resource('admin', 'AdminController')->parameters([
    'admin' => 'id',
]);

Route::get('order/{id}/done', 'OrderController@done')->name('order.done');
Route::post('api/order', 'OrderController@api')->name('order.api');
Route::resource('order', 'OrderController')->parameters([
    'order' => 'id',
]);


Route::get('seller/buy', 'SellerController@buy')->name('seller.buy');
Route::put('seller/{id}/buy', 'SellerController@buyUpdate')->name('seller.buy.update');

Route::get('seller/{id}/done', 'SellerController@done')->name('seller.done');
Route::post('api/seller', 'SellerController@api')->name('seller.api');
Route::resource('seller', 'SellerController')->parameters([
    'seller' => 'id',
]);



Route::post('api/payment', 'PaymentController@api')->name('payment.api');
Route::resource('payment', 'PaymentController')->parameters([
    'payment' => 'id',
]);

Route::post('api/site', 'SiteController@api')->name('site.api');
Route::get('site/change/{id}', 'SiteController@change')->name('site.change');
Route::get('site/{id}/about', 'SiteController@editAbout')->name('site.about.edit');
Route::put('site/{id}/about', 'SiteController@updateAbout')->name('site.about.update');
Route::resource('site', 'SiteController')->parameters([
    'site' => 'id',
]);

Route::namespace('Site')->name('site.')->group(function () {
    // Categories
    Route::post('api/category', 'CategoryController@api')->name('category.api');
    Route::resource('category', 'CategoryController')->parameters([
        'category' => 'id',
    ]);
    // Products
    Route::post('api/product', 'ProductController@api')->name('product.api');
    Route::resource('product', 'ProductController')->parameters([
        'product' => 'id',
    ]);
    // Bank Accounts
    Route::post('api/bank-account', 'BankAccountController@api')->name('bank-account.api');
    Route::resource('bank-account', 'BankAccountController')->parameters([
        'bank-account' => 'id',
    ]);

    // News
    Route::post('api/news', 'NewsController@api')->name('news.api');
    Route::resource('news', 'NewsController')->parameters([
        'news' => 'id',
    ]);

    // Testimonials
    Route::post('api/testimonial', 'TestimonialController@api')->name('testimonial.api');
    Route::resource('testimonial', 'TestimonialController')->parameters([
        'testimonial' => 'id',
    ]);
});
