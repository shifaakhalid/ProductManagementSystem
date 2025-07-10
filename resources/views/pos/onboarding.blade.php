@extends('layouts.poslayout2')

@section('content')
<div class="animate-fade-in-up">
  <section class="max-w-4xl mx-auto py-20 px-4 text-center">
    <h2 class="text-4xl font-bold gradient-text mb-4">🎉 Welcome to SaleMart!</h2>
    <p class="text-gray-600 text-lg mb-10">We’re excited to have you on board. Let’s get your POS system ready in 3 simple steps:</p>

    <div class="grid md:grid-cols-2 gap-8 text-left mb-12">

 <a href="{{ route('onboarding-payment') }}"><div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
        <h4 class="font-bold text-pink-500 text-xl mb-2 ">2. Set Up Payment</h4>
        <p class="text-gray-600">Configure your payment options like cash, card, and digital wallets.</p>
      </div></a>

<!-- 
     <a href="{{ route('onboarding-product') }}"> <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
        <h4 class="font-bold text-blue-500 text-xl mb-2">1. Add Your Products</h4>
        <p class="text-gray-600">Start by adding products from your inventory or import them if available.</p>
      </div></a>

      -->

      <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
        <h4 class="font-bold text-pink-500 text-xl mb-2">3. Start Selling</h4>
        <p class="text-gray-600">Go to the POS dashboard and begin making sales with live tracking.</p>
      </div>
    </div>

    <a href="{{ route('home') }}" class="inline-block bg-gradient-to-r from-pink-500 to-blue-500 text-white py-3 px-8 rounded-full text-lg font-semibold hover:scale-105 transition">
      🚀 Go to Dashboard
    </a>
  </section>
</div>
@endsection
