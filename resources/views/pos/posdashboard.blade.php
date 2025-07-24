@extends('layouts.poslayout2')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">📊 Dashboard</h1>


    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white p-6 rounded-2xl shadow text-center">
            <p class="text-sm text-gray-500">Total Products</p>
            <h2 class="text-2xl font-bold text-blue-600 mt-2"> {{ count(session('products', [])) }}
        </div>
        <div class="bg-white p-6 rounded-2xl shadow text-center">
            <p class="text-sm text-gray-500">Orders Today</p>
            <h2 class="text-2xl font-bold text-green-600 mt-2">{{ $todayOrderCount }}</h2>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow text-center">
            <p class="text-sm text-gray-500">Cart Items</p>
            @php
            $cart = session('cart', []);
            $cartCount = collect($cart)->sum('quantity');
            @endphp
            <h2 class="text-2xl font-bold text-pink-600 mt-2">{{ $cartCount }}</h2>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow text-center">
            <p class="text-sm text-gray-500">Total Revenue</p>
            <h2 class="text-2xl font-bold text-yellow-600 mt-2"> {{ number_format($todaysRevenue, 2) }}</h2>
        </div>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="{{ route('products.index') }}"
            id="total-products" class="bg-gradient-to-r from-pink-500 to-purple-500 text-white rounded-2xl shadow p-6 hover:scale-105 transition">
            <h3 class="text-xl font-semibold mb-2">🛍️ Manage Products</h3>
            <p class="text-sm opacity-80">Add, edit, or remove products from your catalog.</p>
        </a>
        <a href="{{ route('cart') }}"
            class="bg-white border border-gray-200 p-6 rounded-2xl shadow hover:shadow-md transition">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">🛒 View Cart</h3>
            <p class="text-sm text-gray-600">See current cart items and proceed to checkout.</p>
        </a>
        <a href="{{ route('onboarding') }}"
            class="bg-white border border-gray-200 p-6 rounded-2xl shadow hover:shadow-md transition">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">💸 Point of Sale</h3>
            <p class="text-sm text-gray-600">Complete transactions quickly and easily.</p>
        </a>
    </div>
</div>
@endsection
@section('scripts')
<script>
    const products = document.getElementById('total-products');
</script>

@endsection