<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::get('/produkty', 'ProductController@index')->name('products');
Route::get('/produkty/{product}', 'ProductController@show')->name('product');

Route::get('/koszyk', 'CartController@show')->name('cart');
Route::post('/koszyk/dodaj/{product}', 'CartController@addToCart')->name('cart.add');
Route::post('/koszyk/ustaw-ilosc/{product}', 'CartController@setQuantity')->name('cart.setQuantity');
Route::post('/koszyk/oproznij', 'CartController@emptyCart')->name('cart.empty');

Route::get('/platnosc/logowanie', 'PaymentController@showLoginForm')->name('payment.login');
Route::get('/platnosc/dane', 'PaymentController@showContactForm')->name('payment.contact');
Route::post('/platnosc/dane', 'PaymentController@updateContactDetails')->name('payment.contact.update');
Route::get('/platnosc', 'PaymentController@showConfirmForm')->name('payment.confirm');
Route::post('/platnosc', 'PaymentController@performPayment')->name('payment');

Route::get('/platnosci', 'PaymentController@showPayments')
    ->name('payments')
    ->middleware('auth');
Route::get('/platnosci/{purchase}', 'PaymentController@showPayment')->name('payment.show');

Auth::routes();
