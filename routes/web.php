<?php

use \Illuminate\Http\Request;

// Wyświetlenie strony głównej
Route::view('/', 'home');

// Wyświetlenie strony logowania
Route::view('/login', 'login');

// Wyświetlenie strony rejestracji
Route::view('/register', 'register');

// Wyświetlenie listy produktów
Route::view('/products', 'product.list');

// Wyświetlenie informacji o produkcie
Route::get('/product/{product_id}', function ($product_id) {
    return view('product.details', [
        'product_id' => $product_id,
        'product' => 'Nazwa'
    ]);
})->where('product_id', '[0-9]+');

// Dodanie produktu do koszyka
Route::post('/product/{product_id}/add-to-cart', function (Request $request, $product_id) {
    $request->session()->push('cart', $product_id);
    return redirect()->back();
})->where('product_id', '[0-9]+');
