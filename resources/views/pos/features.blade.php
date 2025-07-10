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

<div class="max-w-6xl mx-auto px-4 py-16 text-center animate-fade-in-up">
  <h2 class="text-4xl font-bold gradient-text mb-6  ">Features That Make Selling Simple</h2>
  <p class="text-gray-600 text-lg mb-12">Everything you need to manage sales, customers, and inventory in one powerful POS system.</p>

  <div class="grid md:grid-cols-3 gap-8 text-left animate-fade-in-up">
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition  ">
      <div class="text-3xl text-pink-500 mb-3">🛍️</div>
      <h3 class="text-xl font-semibold mb-2">Live Product Search</h3>
      <p>Quickly find and select products during checkout with real-time search and autocomplete.</p>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
      <div class="text-3xl text-blue-500 mb-3">🛒</div>
      <h3 class="text-xl font-semibold mb-2">Smart Cart System</h3>
      <p>Automatically updates totals, applies taxes, and prevents overselling with stock checks.</p>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
      <div class="text-3xl text-pink-500 mb-3">📦</div>
      <h3 class="text-xl font-semibold mb-2">Inventory Tracking</h3>
      <p>Keep real-time track of your product quantities and get alerts before you run out.</p>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
      <div class="text-3xl text-blue-500 mb-3">💳</div>
      <h3 class="text-xl font-semibold mb-2">Multiple Payment Options</h3>
      <p>Accept cash, card, UPI, and more — securely and instantly, with receipts generated.</p>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
      <div class="text-3xl text-pink-500 mb-3">🧾</div>
      <h3 class="text-xl font-semibold mb-2">Receipts & History</h3>
      <p>Print or view detailed receipts and review all past transactions in one place.</p>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
      <div class="text-3xl text-blue-500 mb-3">📊</div>
      <h3 class="text-xl font-semibold mb-2">Sales Analytics</h3>
      <p>See your daily, weekly, and monthly performance with powerful reports and trends.</p>
    </div>
  </div>
</div>
@endsection
