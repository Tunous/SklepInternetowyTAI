<?php

namespace App\Http\Controllers;

use App\Product;
use App\Purchase;
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
        $contact_details = session('contact_details');
        if (Auth::check()) {
            $user = Auth::user();
            $user_details = $user->contactDetails;
            $contact_details = [
                'name' => $user_details->name,
                'surname' => $user_details->surname,
                'street' => $user_details->street,
                'postcode' => $user_details->postcode,
                'city' => $user_details->city,
                'phone' => $user_details->phone,
                'email' => $user->email
            ];
        } else if ($contact_details == null) {
            $contact_details = [
                'name' => '',
                'surname' => '',
                'street' => '',
                'postcode' => '',
                'city' => '',
                'phone' => '',
                'email' => ''
            ];
        }
        return view('cart.contact-form', [
            'contact_details' => $contact_details
        ]);
    }

    public function showConfirmForm(Request $request)
    {
        $data = $this->getCartData($request);
        $data['contact_details'] = $request->session()->get('contact_details');
        return view('cart.confirm', $data);
    }

    public function updateContactDetails(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'postcode' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone' => 'required|digits:9'
        ]);

        if (!Auth::check()) {
            $this->validate($request, [
                'email' => 'string|email|max:255|unique:users'
            ]);
        }

        $contact_details = [
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'street' => $request->input('street'),
            'postcode' => $request->input('postcode'),
            'city' => $request->input('city'),
            'phone' => $request->input('phone')
        ];

        if (Auth::check()) {
            $user = Auth::user();
            $user->contactDetails()->updateOrCreate($contact_details);

            $contact_details['email'] = $user->email;
        } else {
            $contact_details['email'] = $request->input('email');
        }

        $request->session()->put('contact_details', $contact_details);

        return $this->showConfirmForm($request);
    }

    public function performPayment(Request $request)
    {
        $contact_details = $request->session()->get('contact_details');
        $purchase = new Purchase($contact_details);

        if (Auth::check()) {
            Auth::user()->purchases()->save($purchase);
        } else {
            $purchase->save();
        }

        $cart = $this->getCartData($request);
        foreach ($cart['products'] as $product) {
            $purchase->products()->attach($product->id, [
                'quantity' => $product->quantity
            ]);
        }

        $request->session()->remove('cart');
        $request->session()->remove('contact_details');

        return redirect(route('home'));
    }
}
