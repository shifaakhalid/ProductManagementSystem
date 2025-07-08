<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class POSController extends Controller
{
    public function index()
    {
        return view('pos.home');
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
