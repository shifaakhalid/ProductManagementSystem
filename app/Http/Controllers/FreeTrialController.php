<?php

namespace App\Http\Controllers;

use App\Models\FreeTrial;
use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\FreeTrial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FreeTrialController extends Controller
{
    public function store(Request $request)
    {
        // Check if business already exists
        $existingBusiness = DB::table('free_trials')
            ->where('business_email', $request->business_email)
            ->first();

        if ($existingBusiness) {
            return redirect()
                ->route('freetrial')
                ->with('error', 'This business already exists.');
        }

        // Validation
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:free_trials,email',
            'business_name' => 'required|string|max:150',
            'business_email' => 'required|string|max:150',
            'business_password' => 'required|string|max:60',
        ]);

        // Save trial
        FreeTrial::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'business_name' => $validated['business_name'],
            'business_email' => $validated['business_email'],
           'business_password' => Hash::make($request->business_password),
        ]);

        session(['setup_done' => true]);

        return redirect()->route('onboarding')->with('success', 'Free trial started! Check your email.');
    }
}
