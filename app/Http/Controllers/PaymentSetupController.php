<?php

namespace App\Http\Controllers;

use App\Models\PaymentSetup;
use Illuminate\Http\Request;

class PaymentSetupController extends Controller
{
    public function storePaymentDetails(Request $request)
    {
          $methods = session('payment_methods', []);

          if (in_array('digital_wallet', $methods)) {
        $request->validate([
            'wallet_name' => 'required|string|max:255',
            'wallet_number' => 'required|string|max:255',
            'wallet_reference' => 'nullable|string|max:255',
        ]);

        PaymentSetup::create([
            'user_id' => auth()->id(),
            'method' => 'easypaisa',
            'account_name' => $request->input('wallet_name'),
            'account_number' => $request->input('wallet_number'),
            'reference' => $request->input('wallet_reference'),
        ]);

        return redirect()-> route('pos.onboarding.paymentdetails')->with('success', 'Easypaisa setup saved to database!');
    }
}
}