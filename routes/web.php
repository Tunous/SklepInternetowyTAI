<?php

Route::view('/', 'home')->name('home');

Route::get('/produkty', 'ProductController@index')->name('products');
Route::get('/produkty/{product}', 'ProductController@show')->name('product');

Route::get('/koszyk', 'CartController@show')->name('cart');
Route::post('/koszyk/dodaj/{product}', 'CartController@addToCart')->name('add-to-cart');
Route::post('/koszyk/usun/{product}', 'CartController@removeFromCart')->name('remove-from-cart');
Route::post('/koszyk/ustaw-ilosc/{product}', 'CartController@setQuantity')->name('set-cart-item-quantity');
Route::get('/koszyk/logowanie', 'CartController@showLoginForm')->name('cart-login');
Route::get('/koszyk/platnosc', 'CartController@showBuyForm')->name('cart-buy');

Auth::routes();
