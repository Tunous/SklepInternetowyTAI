<?php

Route::view('/', 'home');

Route::get('produkty', 'ProductController@index');
Route::get('produkty/{product}', 'ProductController@show');
Route::post('produkty/{product}/dodaj-do-koszyka', 'ProductController@addToCart');

Auth::routes();
