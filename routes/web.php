<?php

Route::view('/', 'home')->name('home');

Route::get('/produkty', 'ProductController@index')->name('products');
Route::get('/produkty/{product}', 'ProductController@show')->name('product');
Route::post('/produkty/{product}/dodaj-do-koszyka', 'ProductController@addToCart')->name('add-to-cart');

Route::view('/koszyk', 'home')->name('cart');

Auth::routes();
