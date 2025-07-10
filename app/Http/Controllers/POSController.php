<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\FreeTrial;

class POSController extends Controller
{


public function businessLogin(Request $request)
{
    $request->validate([
        'business_email' => 'required|email',
        'business_password' => 'required|string',
    ]);

    $credentials = [
        'business_email' => $request->business_email,
        'password' => $request->business_password,
    ];

    $user = FreeTrial::where('business_email', $credentials['business_email'])->first();

    // 🔍 Debug info
    // dd([
    //     'entered_email' => $credentials['business_email'],
    //     'entered_password' => $credentials['password'],
    //     'user_found' => $user !== null,
    //     'db_password' => optional($user)->business_password,
    //     'password_match' => $user ? Hash::check($credentials['password'], $user->business_password) : 'no user found',
    // ]);

    if (Auth::guard('free_trial')->attempt($credentials)) {
        return redirect()->route('onboarding');
    } else {
        return back()->with('error', 'Invalid login credentials');
    }
}




    public function getProducts()
    {
        $products = Product::all(); // or paginate(20) if too many
        return view('pos.products', compact('products'));
    }
    public function shop()
    {
        $products = Product::latest()->paginate(12); // change to all() if no pagination needed
        return view('pos.shop', compact('products'));
    }

    public function search(Request $request)
    {
        $query = $request->q;
        $products = Product::where('name', 'LIKE', " %{$query}% ")
            ->orWhere('barcode', 'LIKE', "%{$query}")
            ->get();
        return response()->json($products);
    }
    public function completeSale(Request $request)
    {
        try {
            DB::beginTransaction();

            $cart = $request->input('cart');
            $name = $request->input('name');
            $phone = $request->input('phone');
            $method = $request->input('method');
            //create sale record
            $sale = Sale::create([
                'customer_name' => $name,
                'customer_phone' => $phone,
                'payment_method' => $method,
                'total_amount' => collect($cart)->sum(fn($item) => $item['qty'] * $item['price']),
            ]);

            foreach ($cart as $item) {
                $product = Product::find($item['id']);
                if ($product->stock < $item['qty']) {
                    throw new \Exception('Not enough stock for: ' . $product->name);
                }

                DB::commit();
                return response()->json(['success' => true]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
