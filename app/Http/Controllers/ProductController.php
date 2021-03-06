<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    public function home()
    {
        $product = Product::first();
        return view('home', [
            'product' => $product
        ]);
    }

    public function index()
    {
        $products = Product::all();
        return view('product.list', [
            'products' => $products
        ]);
    }

    public function show(Product $product)
    {
        return view('product.details', [
            'product' => $product
        ]);
    }
}
