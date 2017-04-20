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

Route::group(['middleware' => ['web']], function () {
  Route::get('/', 'PagesController@index');
 
  Route::get('category/{id}','PagesController@displayProducts')->name('category_product');

  Route::get('product/{id}', [
    'uses' => '\App\Http\Controllers\ProductsController@show',
    'as'   => 'show.product',
  ]);

  Route::post('/queries', [
        'uses' => '\App\Http\Controllers\QueryController@search',
        'as'   => 'queries.search',
    ]);

  Route::get('/profile', 'ProfileController@index');

  Route::get('/login', 'Auth\LoginController@showLoginForm')->name('auth.login_form');
  Route::post('/login', 'Auth\LoginController@login')->name('auth.login');
  Route::post('/logout', 'Auth\LoginController@logout')->name('auth.logout');

  Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
  Route::post('/register', 'Auth\RegisterController@register')->name('auth.register');

  Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
  Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');

  Route::get('/cart', array(
        'before' => 'auth.basic',
        'as'     => 'cart',
        'uses'   => 'CartController@showCart'
    ));

    Route::post('/cart/add', array(
        'before' => 'auth.basic',
        'uses'   => 'CartController@addCart'
    ));

    Route::get('/cart/add', array(
        'before' => 'auth.basic',
        'uses'   => 'CartController@addCart'
    ));

    Route::post('/cart/update', [
        'uses' => 'CartController@update'
    ]);

    Route::get('/cart/delete/{id}', array(
        'before' => 'auth.basic',
        'as'     => 'delete_book_from_cart',
        'uses'   => 'CartController@delete'
    ));

    Route::get('/checkout', [
        'uses' => '\App\Http\Controllers\OrderController@index',
        'as'   => 'checkout',
        'middleware' => ['auth'],
    ]);
    
    Route::post('/order',
        array(
            'before' => 'auth.basic',
            'as'     => 'order',
            'uses'   => 'OrderController@postOrder'
        ));
});

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'store'], function () {
  Route::get('/login', 'StoreAuth\LoginController@showLoginForm');
  Route::post('/login', 'StoreAuth\LoginController@login');
  Route::post('/logout', 'StoreAuth\LoginController@logout');

  Route::get('/register', 'StoreAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'StoreAuth\RegisterController@register');

  Route::post('/password/email', 'StoreAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'StoreAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'StoreAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'StoreAuth\ResetPasswordController@showResetForm');
});
