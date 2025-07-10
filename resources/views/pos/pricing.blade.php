@extends('layouts.poslayout')

@section('content')
<style>
  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to   { opacity: 1; transform: translateY(0); }
  }
  .animate-fade-in-up {
    animation: fadeInUp 1s ease-out both;
  }
</style>
<div class="max-w-6xl mx-auto px-4 py-20 text-center animate-fade-in-up">
  <h2 class="text-4xl font-bold gradient-text mb-4">Transparent & Simple Pricing</h2>
  <p class="text-gray-600 text-lg mb-12">Choose the perfect plan for your business. No hidden fees. Cancel anytime.</p>

  <div class="grid md:grid-cols-3 gap-8 text-left">
    <!-- Starter Plan -->
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition border-t-4 border-pink-500">
      <h3 class="text-2xl font-bold text-pink-600 mb-2">Starter</h3>
      <p class="text-gray-600 mb-4">For small shops & first-time sellers</p>
      <h4 class="text-3xl font-bold mb-6">PKR 0 <span class="text-base font-medium text-gray-500">/month</span></h4>
      <ul class="space-y-2 text-gray-700">
        <li>✔ Basic POS functionality</li>
        <li>✔ 100 Products</li>
        <li>✔ 1 Staff Account</li>
        <li>✘ No analytics</li>
        <li>✘ No multi-device sync</li>
      </ul>
      <a href="{{ route('freetrial') }}"><button class="mt-6 w-full bg-pink-500 text-white py-2 rounded hover:bg-pink-600 transition">Get Started</button>
    </div></a>

    <!-- Pro Plan -->
    <div class="bg-white p-6 rounded-2xl shadow-xl transition border-t-4 border-blue-500 scale-105">
      <h3 class="text-2xl font-bold text-blue-600 mb-2">Pro</h3>
      <p class="text-gray-600 mb-4">For growing stores & serious sellers</p>
      <h4 class="text-3xl font-bold mb-6">PKR 1,999 <span class="text-base font-medium text-gray-500">/month</span></h4>
      <ul class="space-y-2 text-gray-700">
        <li>✔ All Starter features</li>
        <li>✔ Unlimited Products</li>
        <li>✔ 5 Staff Accounts</li>
        <li>✔ Sales Analytics</li>
        <li>✔ Email Support</li>
      </ul>
      <button class="mt-6 w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">Try Pro</button>
    </div>

    <!-- Enterprise Plan -->
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition border-t-4 border-pink-500">
      <h3 class="text-2xl font-bold text-pink-600 mb-2">Enterprise</h3>
      <p class="text-gray-600 mb-4">For franchises & large businesses</p>
      <h4 class="text-3xl font-bold mb-6">Custom</h4>
      <ul class="space-y-2 text-gray-700">
        <li>✔ All Pro features</li>
        <li>✔ Unlimited Staff</li>
        <li>✔ Dedicated Support</li>
        <li>✔ Cloud Sync</li>
        <li>✔ Custom Reports</li>
      </ul>
      <button class="mt-6 w-full bg-pink-500 text-white py-2 rounded hover:bg-pink-600 transition">Contact Sales</button>
    </div>
  </div>
</div>
@endsection
