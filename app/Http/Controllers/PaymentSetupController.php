<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Models\PaymentSetup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentSetupController extends Controller
{ 
 public function storePaymentDetails(Request $request)
{
  //   Log::info('Payment method hit');
  //  dd(auth('free_trial')->id());
$request->validate([
    'payment_method' => 'required|string',
    
    // Easypaisa Fields
    'easypaisa_account_name' => 'required_if:payment_method,easypaisa',
    'easypaisa_account_number' => 'required_if:payment_method,easypaisa',
    'easypaisa_account_reference' => 'required_if:payment_method,easypaisa',


    // Jazzcash Fields
    'jazzcash_account_name' => 'required_if:payment_method,jazzcash',
    'jazzcash_account_number' => 'required_if:payment_method,jazzcash',

    // Bank Fields
    'bank_title' => 'required_if:payment_method,bank',
    'bank_name' => 'required_if:payment_method,bank',
    'bank_number' => 'required_if:payment_method,bank',


]);


PaymentSetup::create([
    'user_id' => auth('free_trial')->id(),
    'method' => $request->payment_method,

    // Easypaisa
    'easypaisa_account_name' => $request->easypaisa_account_name,
    'easypaisa_account_number' => $request->easypaisa_account_number,
    'easypaisa_account_reference' => $request->easypaisa_account_number,

    // Jazzcash
    'jazzcash_account_name' => $request->jazzcash_account_name,
    'jazzcash_account_number' => $request->jazzcash_account_number,

    // Wallet
    'reference' => $request->wallet_reference,

    // Bank
    'bank_title' => $request->bank_title,
    'bank_name' => $request->bank_name,
    'bank_number' => $request->bank_number,
]);


    return redirect()->back()->with('success', 'Payment details have been set!');
}

}