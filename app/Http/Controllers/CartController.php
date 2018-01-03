<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show(Request $request)
    {
        return view('cart.cart', self::getCartData($request));
    }

    public function addToCart(Request $request, Product $product)
    {
        $cart = $request->session()->get('cart', []);
        $current_quantity = array_get($cart, $product->id, 0);
        $cart[$product->id] = $current_quantity + 1;
        $request->session()->put('cart', $cart);
        return back();
    }

    public function setQuantity(Request $request, Product $product)
    {
        if ($request->input('action', 'set') == 'remove') {
            $quantity = 0;
        } else {
            $this->validate($request, [
                'quantity' => 'required|integer|min:1|max:20'
            ]);
            $quantity = $request->input('quantity');
        }

        $cart = $request->session()->get('cart', []);
        if ($quantity == 0) {
            $cart = array_except($cart, $product->id);
        } else {
            $cart[$product->id] = $quantity;
        }
        $request->session()->put('cart', $cart);

        return back();
    }

    public function emptyCart(Request $request)
    {
        $request->session()->remove('cart');
        return back();
    }

    public static function getCartData(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $products = Product::find(array_keys($cart));

        $products_with_quantity = collect($products)
            ->map(function (Product $product) use ($cart) {
                $product->quantity = $cart[$product->id];
                return $product;
            });

        $total_cost = collect($products_with_quantity)
            ->map(function (Product $product) {
                return $product->cost * $product->quantity;
            })
            ->sum();

        return [
            'products' => $products_with_quantity,
            'total_cost' => $total_cost
        ];
    }
}
