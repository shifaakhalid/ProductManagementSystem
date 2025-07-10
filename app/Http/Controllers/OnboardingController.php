<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnboardingController extends Controller
{
    // Step 1: Payment Setup Page
    public function payment()
    {
        return view('pos.onboarding.setupPayment');
    }

    public function storePayment(Request $request)
    {
        $validated = $request->validate([
            'payment_methods'=>'required|array|min:1',
        ]);
        session (['payment_methods'=> $validated['payment_methods']]);
        return redirect()->route('onboarding')->with('success');
    }
    // Step 2: Add First Product Page
    public function product()
    {
        return view('pos.onboarding.addproduct');
    }

    // Step 3: Complete Onboarding
    public function complete(Request $request)
    {
        // You can validate other onboarding steps here...

        session(['onboarding_done' => true]);

        return redirect('/products')->with('success', 'Onboarding completed successfully!');
    }
}
