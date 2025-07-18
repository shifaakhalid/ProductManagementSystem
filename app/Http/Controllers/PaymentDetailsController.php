<?php

namespace App\Http\Controllers;


use App\Models\PaymentDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentDetailsController extends Controller
{


    public function stripeForm()
    {
        return view('pos.stripe.form');
    }
    public function pay(Request $request)
    {
        Stripe::setApiKey(config('stripe.secret'));
        try {
            $charge = Charge::create([
                'amount' => 1000,
                'currency' => 'usd',
                'description' => 'laravel Stripe Payment',
                'source' => $request->stripeToken,
            ]);

            PaymentDetails::create([
                'user_id' => auth()->id(),
                'payment_method' => 'stripe',
                'transaction_id' => $charge->id,
                'amount' => $charge->amount / 100,
                'status' => 'success',
                'response' => json_encode($charge)
            ]);

            return back()->with('success', 'payment successful');
        } catch (\Exception $e) {
            return back()->with('error', 'payment Failed');
        }
    }
}
