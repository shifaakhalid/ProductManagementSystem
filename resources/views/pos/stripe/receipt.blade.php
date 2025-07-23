@extends('layouts.poslayout2')
@if(session('error'))
    <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
        {{ session('success') }}
    </div>
@endif


@section('content')
<div class="max-w-md mx-auto mt-12 bg-white border border-dashed border-gray-300 rounded-xl shadow-lg print:shadow-none print:border-none p-6 print:p-2">
    <h2 class="text-2xl font-semibold text-center text-gray-800 tracking-widest uppercase mb-6 border-b border-gray-300 pb-2">Receipt</h2>
      
        <p class="text-sm text-gray-500">{{ $receipt->created_at->format('d M Y, h:i A') }}</p>
  

   <div class=" text-sm text-gray-800">
        <p class="flex justify-between  border-gray-300 mt-4"><span class="font-semibold">Customer:</span> {{ $receipt->customer_name }}</p>
        <p class="flex justify-between border-b border-dotted border-gray-300 pb-2"><span class="font-semibold">Email:</span> {{ $receipt->email }}</p>
    </div>
 <h3 class="text-lg font-semibold text-gray-800 ">Products:</h3>
    <ul class="divide-y divide-gray-200">
        @foreach(json_decode($receipt->products, true) as $product)
            <li class="py-2 flex justify-between text-sm text-gray-700">
                <span>{{ $product['name'] }} ({{ $product['quantity'] }} x {{ $product['price'] }})</span>
                <span>${{ $product['quantity'] * $product['price'] }}</span>
            </li>
        @endforeach
    </ul>
    <div class="border-t border-b py-4 mb-4">
        <div class="flex justify-between text-gray-700 mb-2">
            <span class="font-medium">Subtotal:</span>
            <span>${{ number_format($receipt->subtotal, 2) }}</span>
        </div>
        <div class="flex justify-between text-gray-700 mb-2">
            <span class="font-medium">Tax:</span>
            <span>${{ number_format($receipt->taxAmount, 2) }}</span>
        </div>
        <div class="flex justify-between text-gray-900 font-bold text-lg">
            <span>Total:</span>
            <span>${{ number_format($receipt->total_amount, 2) }}</span>
        </div>
    </div>

    <div class="mb-4 text-gray-700">
        <p><span class="font-semibold">Payment Method:</span> {{ $receipt->payment_method }}</p>
        <p><span class="font-semibold">Payment Status:</span> {{ $receipt->payment_status }}</p>
        <p><span class="font-semibold">Transaction ID:</span> {{ $receipt->transaction_id }}</p>
    </div>

   
</div>
</div>
@endsection
