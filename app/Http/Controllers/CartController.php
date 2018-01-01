<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private function getCartData(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $product_ids = array_keys($cart);
        $products = Product::find($product_ids);

        $products_with_quantity = collect($products)->map(function ($value) use ($cart) {
            $value->quantity = $cart[$value->id];
            return $value;
        });

        $product_prices = collect($products_with_quantity)->map(function ($value) {
            return $value->cost * $value->quantity;
        });
        $total_cost = $product_prices->sum();

        return [
            'products' => $products_with_quantity,
            'total_cost' => $total_cost
        ];
    }

    public function show(Request $request)
    {
        return view('cart.cart', $this->getCartData($request));
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

    public function showLoginForm()
    {
        return Auth::check()
            ? $this->showContactForm()
            : view('cart.login');
    }

    public function showContactForm()
    {
        return view('cart.contact-form');
    }

    public function showConfirmForm(Request $request)
    {
        return view('cart.confirm', $this->getCartData($request));
    }

    public function updateContactDetails(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'postcode' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone' => 'required|digits:9',
            'email' => 'string|email|max:255|unique:users'
        ]);

        if (Auth::check()) {
            $user = Auth::user();
            $user->name = $request->input('name');
            $user->surname = $request->input('surname');
            $user->street = $request->input('street');
            $user->postcode = $request->input('postcode');
            $user->city = $request->input('city');
            $user->phone = $request->input('phone');
            $user->save();
        }

        return $this->showConfirmForm($request);
    }

    public function performPayment()
    {
        return redirect(route('home'));
    }
}