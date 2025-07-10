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



@extends('layouts.poslayout')

@section('content')

<div class="animate-fade-in-up">
  <section class="max-w-4xl mx-auto px-4 py-20 text-center">
    <h2 class="text-4xl font-bold gradient-text mb-4">Start Your Free Trial</h2>
    <p class="text-gray-600 mb-8">No credit card required. Try POSMaster free for 14 days and see how it transforms your sales experience.</p>

    <form action="{{ route('freetrial.submit') }}" method="POST" class="bg-white rounded-xl shadow-md p-8 text-left max-w-xl mx-auto">
      @csrf
      <div class="mb-4">
        <label class="block mb-1 font-medium text-gray-700">Your Name</label>
        <input type="text" name="name" class="w-full p-3 border border-gray-300 rounded-lg" required>
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-medium text-gray-700">Email Address</label>
        <input type="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg" required>
      </div>

      <div class="mb-6">
        <label class="block mb-1 font-medium text-gray-700">Business Name</label>
        <input type="text" name="business_name" class="w-full p-3 border border-gray-300 rounded-lg" required>
      </div>
       <div class="mb-6">
        <label class="block mb-1 font-medium text-gray-700">Business Email</label>
        <input type="email" name="business_email" class="w-full p-3 border border-gray-300 rounded-lg" required>
      </div>
       <div class="mb-6">
        <label class="block mb-1 font-medium text-gray-700">Business Password</label>
        <input type="password" name="business_password" class="w-full p-3 border border-gray-300 rounded-lg" required>
      </div>

      <a href=""><button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-blue-500 text-white py-3 rounded-lg font-semibold hover:scale-105 transition">Start Free Trial</button></a>
 <p class="mt-4 text-md text-center text-gray-600">
      Already have an account?
      <a href="{{ route('freetriallogin') }}" class="text-blue-500 hover:underline">Login</a>
    </p>
    </form>
  </section>
</div>
@endsection
