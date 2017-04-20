<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('store')->user();

    //dd($users);

    return view('store.home');
})->name('home');


Route::resource('product', 'Store\ProductController');
Route::get('/my-products', 'Store\ProductController@index')->name('my_products');
Route::get('/create-product', 'Store\ProductController@create')->name('product_create');
Route::get('/edit-product/{id}', 'Store\ProductController@edit')->name('product_edit');
Route::get('/show-product/{id}', 'Store\ProductController@show')->name('product_detail');

// Route::post('/store-product', 'Store\ProductController@store')->name('product_store');
Route::post('/update-product/{id}', 'Store\ProductController@update')->name('product_update');
Route::post('/delete-product/{id}', 'Store\ProductController@destroy')->name('product_delete');

Route::get('/my-orders', 'Store\OrderController@index')->name('my_orders');
Route::get('/my-order-detail/{id}', 'Store\OrderController@show')->name('my_order_detail');
Route::post('/my-order-delete/{id}', 'Store\OrderController@destroy')->name('my_order_delete');