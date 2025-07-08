<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $cart = Session()->get('cart', []);
        $product = Product::findOrFail($request->id);

        if ($product->stock = 0) {
            return response()->json(['error' => 'Out of Stock'], 400);
        }
        if (isset($Cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,

            ];
        }

        session()->put('cart', $cart);
        return response()->json(['success'=> true]);
    }

    public function remove(Request $request){
        $cart = session()->get('cart',[]);
        unset($cart[$request->id]);
        session()->put('cart', $cart);
        return response()->json(['success' => true]);
    }
    
    public function get() {
        return response()->json(session()->get('cart', []));
    }
}
