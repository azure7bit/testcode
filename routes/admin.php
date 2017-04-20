<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');

Route::resource('product', 'Admin\ProductController', ['except'=>['update', 'destroy']]);
Route::post('product/destroy/{id}', 'Admin\ProductController@destroy')->name('delete_product');
Route::post('product/{id}','Admin\ProductController@update')->name('update_product');

Route::resource('store', 'Admin\StoreController', ['except'=>['update', 'destroy']]);
Route::post('store/destroy/{id}', 'Admin\StoreController@destroy')->name('delete_store');
Route::post('store/{id}','Admin\StoreController@update')->name('update_store');

Route::resource('order', 'Admin\OrderController', ['except'=>['update', 'destroy']]);
Route::post('order/destroy/{id}', 'Admin\OrderController@destroy')->name('delete_order');
Route::post('order/{id}','Admin\OrderController@update')->name('update_order');

Route::resource('user', 'Admin\UserController', ['except'=>['update', 'destroy']]);
Route::post('user/destroy/{id}', 'Admin\UserController@destroy')->name('delete_user');
Route::post('user/{id}','Admin\UserController@update')->name('update_user');

Route::resource('category', 'Admin\CategoryController', ['except'=>['update', 'destroy']]);
Route::post('category/destroy/{id}', 'Admin\CategoryController@destroy')->name('delete_category');
Route::post('category/{id}','Admin\CategoryController@update')->name('update_category');