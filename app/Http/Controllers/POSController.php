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

        if (Auth::guard('free_trial')->attempt($credentials)) {
            return redirect()->route('onboarding');
        } else {
            return back()->with('error', 'Invalid login credentials');
        }
    }

    public function getProducts()
    {
        $products = Product::all();
        return view('pos.shop', compact('products'));
    }
    public function shop()
    {

        $products = Product::latest()->paginate(12);
        session(['products' => $products]);
        return view('pos.shop', compact('products'));
    }

    //search function
    public function search(Request $request)
    {
        $query = $request->get('query');


        $results = Product::where('name', 'LIKE', "%{$query}%")->get();


        $html = '';
        foreach ($results as $product) {
            $html .= view('partials.product-card', compact('product'))->render();
        }

        return response($html);
    }


    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('pos.cart', compact('cart'));
    }



    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::find($productId);
        $cart = session()->get('cart', []);
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found']);
        }



        if (isset($cart[$productId])) {
           $cart[$productId]['quantity'] += 1;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image ?? null,

            ];
        }
        session()->put('cart', $cart);
        $totalQuantity = collect($cart)->sum('quantity');

        return response()->json(data: [
            'success' => true,
            'totalQuantity' => $totalQuantity,
        ]);
    }

    public function update(Request $request)
    {
        $productId = $request->input('product_id');
        $action = $request->input('action');
        $cart = session()->get('cart', []);

        if (!isset($cart[$productId])) {
            return response()->json(['success' => false, 'message' => 'Product not found in cart']);
        }



        $totalQuantity = collect($cart)->sum('quantity');
        if ($action === 'increase') {
            $cart[$productId]['quantity']++;
        } elseif ($action === 'decrease') {
            $cart[$productId]['quantity'] = max(1, $cart[$productId]['quantity'] - 1);
        }


        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $taxRate = 0.13;
        $taxAmount = $subtotal * $taxRate;
        $totalWithTax = $subtotal + $taxAmount;

        session()->put('cart', $cart);
        return response()->json([
            'success' => true,
            'quantity' => $cart[$productId]['quantity'],
            'total' => $cart[$productId]['price'] * $cart[$productId]['quantity'],
            'subtotal' => number_format($subtotal, 2),
            'tax' => number_format($taxAmount, 2),
            'grand_total' => number_format($totalWithTax, 2),
            'cartCount' => array_sum(array_column($cart, 'quantity')),
            'totalQuantity' => $totalQuantity,

        ]);
    }



    public function remove(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            
            session()->put('cart', $cart);
         $totalQuantity = collect($cart)->sum('quantity');
            return response()->json([
                'success' => true,
                 'totalQuantity' => $totalQuantity,
                // 'cartCount' => count($cart),
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Product not found in cart.',

        ]);
    }

    public function updateCartBadge()
    {
        $cart = session()->get('cart', []);
        $totalQuantity = collect($cart)->sum('quantity');
        return response()->json(['totalQuantity' => $totalQuantity]);
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
