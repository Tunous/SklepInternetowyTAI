<?php

namespace App\Http\Controllers;

use App\ContactDetails;
use App\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function showLoginForm(Request $request)
    {
        if (Auth::check()) {
            $user = $request->user();
            if ($user->contactDetails != null) {
                $user_details = $user->contactDetails;
                $request->session()->put('contact_details', [
                    'name' => $user_details->name,
                    'surname' => $user_details->surname,
                    'street' => $user_details->street,
                    'postcode' => $user_details->postcode,
                    'city' => $user_details->city,
                    'phone' => $user_details->phone,
                    'email' => $user->email
                ]);
                return redirect(route('payment.confirm'));
            }
            return redirect(route('payment.contact'));
        }

        return view('cart.login');
    }

    public function showContactForm(Request $request)
    {
        return view('cart.contact-form', [
            'contact_details' => $request->session()->get('contact_details', [
                'name' => '',
                'surname' => '',
                'street' => '',
                'postcode' => '',
                'city' => '',
                'phone' => '',
                'email' => ''
            ])
        ]);
    }

    public function showConfirmForm(Request $request)
    {
        $data = CartController::getCartData($request);
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
            $user = $request->user();
            $details = $user->contactDetails;
            if (!count($details)) {
                $details = new ContactDetails;
                $details->user_id = $user->id;
            }

            $details->fill($contact_details);
            $details->save();

            $contact_details['email'] = $user->email;
        } else {
            $contact_details['email'] = $request->input('email');
        }

        $request->session()->put('contact_details', $contact_details);

        return redirect(route('payment.confirm'));
    }

    public function performPayment(Request $request)
    {
        $contact_details = $request->session()->get('contact_details');
        $purchase = new Purchase($contact_details);
        $cart = CartController::getCartData($request);

        $purchase->total_cost = $cart['total_cost'];
        $purchase->token = str_random(10);
        if (Auth::check()) {
            $request->user()->purchases()->save($purchase);
        } else {
            $purchase->save();
        }

        foreach ($cart['products'] as $product) {
            $purchase->products()->attach($product->id, [
                'quantity' => $product->quantity
            ]);
        }

        $request->session()->remove('cart');
        $request->session()->remove('contact_details');

        return redirect(route('payment.show', [
            'purchase' => $purchase,
            'token' => $purchase->token
        ]));
    }

    public function showPayment(Request $request, Purchase $purchase)
    {
        $user = $request->user();
        $is_token_valid = $purchase->token === $request->query('token', null);

        if (!Auth::check()) {
            if ($purchase->user_id != null || !$is_token_valid) {
                abort(403);
            }
        } else if (($purchase->user_id != null && $user->id != $purchase->user_id)
            || ($purchase->user_id == null && !$is_token_valid)) {
            abort(403);
        }

        return view('payment.payment', [
            'purchase' => $purchase
        ]);
    }

    public function showPayments(Request $request)
    {
        return view('payment.list', [
            'purchases' => $request->user()->purchases()->latest()->get()
        ]);
    }
}
