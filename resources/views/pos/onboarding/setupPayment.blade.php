@extends('layouts.poslayout2')

@section('content')
<div class="max-w-xl mx-auto py-16 px-4">
    <h2 class="text-3xl font-bold gradient-text text-center mb-6">💳 Setup Your Payment Methods</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route(name: 'onboarding.payment.store') }}" method="POST" class="bg-white p-6 rounded-xl shadow-lg space-y-6">
        @csrf

        <p class="text-gray-600 mb-4">Choose how you want to accept payments:</p>

        <div class="space-y-4">
            <label class="flex items-center space-x-3">
                <input type="checkbox" name="payment_methods[]" value="cash" class="form-checkbox h-5 w-5 text-pink-500">
                <span>Cash</span>
            </label>

            <label class="flex items-center space-x-3">
                <input type="checkbox" name="payment_methods[]" value="card" class="form-checkbox h-5 w-5 text-blue-500">
                <span>Credit/Debit Card</span>
            </label>

            <label class="flex items-center space-x-3">
                <input type="checkbox" name="payment_methods[]" value="digital_wallet" class="form-checkbox h-5 w-5 text-purple-500">
                <span>Digital Wallets (e.g., Easypaisa, JazzCash)</span>
            </label>
        </div>

        <div class="text-center mt-6">
           <a href=""><button type="submit" class="bg-gradient-to-r from-pink-500 to-blue-500 text-white px-6 py-2 rounded-full font-semibold hover:scale-105 transition">
                Save Payment Methods
            </button></a> 
        </div>
    </form>
</div>
@endsection
