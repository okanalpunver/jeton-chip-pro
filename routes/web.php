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

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$currentSite = $_SERVER['HTTP_HOST'] ?? null;

$currentSite = \App\Models\Site::where('fqdn', $currentSite)->first();

if ($currentSite) {
    App::setLocale($currentSite->lang);

    if ($currentSite->out_of_stock == 1) {
        Route::get('{any?}', 'PageController@outOfStock')->name('out-of-stock');
    }

    Route::get('/', 'PageController@home')->name('home');
    Route::get('banka-hesaplari', 'PageController@bankAccount')->name('bank-account');
    Route::get('hakkimizda', 'PageController@about')->name('about');
    Route::get('iletisim', 'PageController@contact')->name('contact');

    Route::get('haberler', 'PageController@getAllNews')->name('news');
    Route::get('haberler/{news}', 'PageController@getNews')->name('news.show');

    Route::post('api/products', 'PageController@products')->name('products');

    Route::get('add/{id}/{amount}', 'PaymentController@addToCart')->name('cart.add');
    Route::get('del/{id}', 'PaymentController@removeFromCart')->name('cart.del');

    Route::get('cart', 'PaymentController@cart')->name('cart.show');

    Route::get('order', 'PaymentController@orderCreate')->name('order.create');
    Route::post('order', 'PaymentController@orderStore')->name('order.store');


    Route::get('checkout', 'PaymentController@checkout')->name('payment.create');
    Route::get('success', 'PaymentController@success')->name('payment.success');
    Route::get('fail', 'PaymentController@fail')->name('payment.fail');




    Route::get('sitemap.xml', function () {
        $arr = [
            '/',
            '/hakkimizda',
            '/banka-hesaplari',
            '/iletisim',
        ];

        $str =  '<?xml version="1.0" encoding="UTF-8"?>';
        $str .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($arr as $a) {
            $str .= '<url>';
            $str .= '<loc>https://' . $_SERVER['HTTP_HOST'] . $a . '</loc>';
            $str .= '<changefreq>monthly</changefreq>';
            $str .= '<priority>0.5</priority>';
            $str .= '</url>';
        }
        $str .= '</urlset>';

        return response($str, 200, [
            'Content-Type' => 'text/xml'
        ]);
    });

    Auth::routes();

    Route::post('webhook/paytr', 'PaymentController@webhook');
}

Route::get('eft', function () {
    return view('eft');
});
