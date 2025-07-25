<?php

namespace App\Http\Controllers;

use App\Models\PaymentDetails;
use App\Models\Receipt;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Stripe\Charge;
use Stripe\Climate\Order;
use Stripe\Stripe;

class PaymentDetailsController extends Controller
{



    public function index()
{
    return view('pos.posdashboard');
}
    public function stripeForm()
    {
        return view('pos.stripe.paymentdetails');
    }

    public function store(Request $request)
    {

        $request->validate([
            'totalWithTax' => 'required|numeric|min:0.01',
            'stripeToken' => 'required|string',
        ]);

        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));

        try {
            $amount = round($request->totalWithTax * 100); // convert to cents

            if ($amount < 1) {
                return back()->with('error', 'Amount too small to process.');
            }

            $charge = $stripe->charges->create([
                'amount' => $amount,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'POS Checkout Payment',
            ]);

            return view('store.receipt')->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }




public function storeReceiptDetails(Request $request)
{
   
    $request->validate([
        'totalWithTax' => 'required|numeric|min:0.01',
        'stripeToken' => 'required|string',
    ]);


    $products = session('cart', []);

    // Calculate subtotal, tax, and total
    $subtotal = array_sum(array_map(function ($item) {
        return $item['price'] * $item['quantity'];
    }, $products));
    $tax = $subtotal * 0.13;
    $total = $subtotal + $tax;

$user = Auth::guard('free_trial')->user();
if ($user) {
     $user->name;
} else {
    echo 'User not logged in';
}

    // Create the receipt
    $receipt = Receipt::create([
        'customer_name' => $user->name,
        'email' => $user->email,
        'products' => json_encode($products),
        'subtotal' => $subtotal,
        'taxAmount' => $tax,
        'total_amount' => $total,
        'payment_method' => 'Stripe',
        'payment_status' => 'Paid',
        'transaction_id' => $request->stripeToken, 
    ]);


$stripe = new \Stripe\StripeClient(config('services.stripe.secret'));


    try {
        $amount = round($request->totalWithTax * 100); // cents

        if ($amount < 1) {
            return back()->with('error', 'Amount too small to process.');
        }

        $charge = $stripe->charges->create([
            'amount' => $amount,
            'currency' => 'usd',
            'source' => $request->stripeToken,
            'description' => 'POS Checkout Payment',
        ]);

       return view('pos.stripe.receipt', compact('receipt'))->with('success', 'Payment successful!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
    }
}
function ordersdaily(){
  $todaysRevenue = Receipt::whereDate('created_at', Carbon::today())->sum('total_amount');
      $todaysOrders = Receipt::whereDate('created_at', Carbon::today())->get();
    $todayOrderCount = $todaysOrders->count();
   return view('pos.posdashboard', [
        'todayOrderCount' => $todayOrderCount,
        'todaysRevenue' => $todaysRevenue
    ]);
}

//     public function store(Request $request)
//     {

//         $request->validate([
//             'totalWithTax' => 'required|numeric|min:0.01',
//             'stripeToken' => 'required|string',
//         ]);

//         $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

//         try {
//             $amount = round($request->totalWithTax * 100); // convert to cents

//             if ($amount < 1) {
//                 return back()->with('error', 'Amount too small to process.');
//             }

//             $charge = $stripe->charges->create([
//                 'amount' => $amount,
//                 'currency' => 'usd',
//                 'source' => $request->stripeToken,
//                 'description' => 'POS Checkout Payment',
//             ]);

//             return view('store.receipt')->with('success', 'Payment successful!');
//         } catch (\Exception $e) {
//             return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
//         }
//     }

//     public function storeReceiptDetails(Request $request)
//     {
//         $products = session('cart', []);
//         dd($products);
//         $subtotal = array_sum(array_map(function ($item) {
//             return $item['price'] * $item['quantity'];
//         }, $products));

//         $tax = $subtotal * 0.13;
//         $total = $subtotal + $tax;

//         try {
//             $receipt = Receipt::create([
//                 'customer_name' => auth()->user()->name ?? 'Guest',
//                 'email' => auth()->user()->email ?? null,
//                 'products' => json_encode($products),
//                 'subtotal' => $subtotal,
//                 'taxAmount' => $tax,
//                 'total_amount' => $total,
//                 'payment_method' => 'Stripe',
//                 'payment_status' => 'Paid',
//                 'transaction_id' => $request->transaction_id ?? null,
//             ]);
//             return view('pos.stripe.receipt', compact('receipt'));
//         } catch (\Exception $e) {
//             return $e->getMessage();
//         }
//     }
}
