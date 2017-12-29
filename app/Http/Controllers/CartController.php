<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $product_ids = array_keys($cart);
        $products = Product::find($product_ids);

        $products_with_quantity = collect($products)->map(function ($value) use ($cart) {
            $value->quantity = $cart[$value->id];
            return $value;
        });

        $product_prices = collect($products)->map(function ($value) {
            return $value->cost;
        });
        $total_cost = $product_prices->sum();

        return view('cart.cart', [
            'products' => $products_with_quantity,
            'total_cost' => $total_cost
        ]);
    }

    public function addToCart(Request $request, Product $product)
    {
        $cart = $request->session()->get('cart', []);
        $current_quantity = array_get($cart, $product->id, 0);
        $cart[$product->id] = $current_quantity + 1;
        $request->session()->put('cart', $cart);
        return back();
    }

    public function removeFromCart(Request $request, Product $product)
    {
        $cart = $request->session()->get('cart', []);
        $new_cart = array_except($cart, $product->id);
        $request->session()->put('cart', $new_cart);
        return back();
    }

    public function setQuantity(Request $request, Product $product)
    {
        $cart = $request->session()->get('cart', []);
//        $cart[$product->id] = $request->
        return back();
    }
}
