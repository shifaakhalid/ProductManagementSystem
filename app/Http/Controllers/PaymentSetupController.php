<?php

namespace App\Http\Controllers;

use App\Models\PaymentSetup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentSetupController extends Controller
{ 
  public function storePaymentDetails(Request $request)
{
    $request->validate([
        'payment_method' => 'required|string|in:easypaisa,jazzcash,bank',
        'wallet_name' => 'required|string|max:255',
        'wallet_number' => 'required|string|max:255',
        'wallet_reference' => 'nullable|string|max:255',
    ]);
// dd(auth('free_trial')->id());
      PaymentSetup::create([
       
        'user_id' => auth('free_trial')->id(),
         'method' => $request->payment_method,
        'account_name' => $request->wallet_name,
        'account_number' => $request->wallet_number,
        'reference' => $request->wallet_reference,
    ]);


    return view('pos.onboarding')->with('success', 'Payment details have been set!');

}

}