<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnboardingController extends Controller
{
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
   
    public function product()
    {
        return view('pos.onboarding.addproduct');
    }

    public function complete(Request $request)
    {
       

        session(['onboarding_done' => true]);

        return redirect('/products')->with('success', 'Onboarding completed successfully!');
    }
}
