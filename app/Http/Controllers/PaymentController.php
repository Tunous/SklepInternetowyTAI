<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function showPayments(Request $request)
    {
        $user = Auth::user();
        return view('payment.list', [
            'purchases' => $user->purchases
        ]);
    }
}
