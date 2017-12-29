<?php

Route::view('/', 'home')->name('home');

Route::get('/produkty', 'ProductController@index')->name('products');
Route::get('/produkty/{product}', 'ProductController@show')->name('product');

Route::get('/koszyk', 'CartController@show')->name('cart');
Route::post('/koszyk/dodaj/{product}', 'CartController@addToCart')->name('add-to-cart');
Route::post('/koszyk/usun/{product}', 'CartController@removeFromCart')->name('remove-from-cart');

Auth::routes();
