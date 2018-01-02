<?php

Route::view('/', 'home')->name('home');

Route::get('/produkty', 'ProductController@index')->name('products');
Route::get('/produkty/{product}', 'ProductController@show')->name('product');

Route::get('/koszyk', 'CartController@show')->name('cart');
Route::post('/koszyk/dodaj/{product}', 'CartController@addToCart')->name('add-to-cart');
Route::post('/koszyk/ustaw-ilosc/{product}', 'CartController@setQuantity')->name('set-cart-item-quantity');
Route::post('/koszyk/oproznij', 'CartController@emptyCart')->name('empty-cart');

Route::get('/platnosc/logowanie', 'CartController@showLoginForm')->name('cart-show-login-form');
Route::get('/platnosc/dane', 'CartController@showContactForm')->name('cart-show-contact-form');
Route::post('/platnosc/dane', 'CartController@updateContactDetails')->name('cart-update-contact-details');
Route::get('/platnosc', 'CartController@showConfirmForm')->name('cart-show-confirm-form');
Route::post('/platnosc', 'CartController@performPayment')->name('cart-buy');

Route::get('/platnosci', 'PaymentController@showPayments')->name('payments');

Auth::routes();
