<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.list', [
            'products' => $products,
            'num_columns' => 3
        ]);
    }

    public function show(Product $product)
    {
        return view('product.details', [
            'product' => $product
        ]);
    }

    public function addToCart(Request $request, Product $product)
    {
        $request->session()->push('cart', $product->id);
        return back();
    }
}
