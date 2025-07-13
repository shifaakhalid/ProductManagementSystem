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
    <h2 class="text-4xl font-bold gradient-text mb-6">LogIn to Your Business</h2>

    <form action="{{ route('business-login') }}" method="POST" class="bg-white rounded-xl shadow-md p-8 text-left max-w-xl mx-auto">
      @csrf

      <div class="mb-4">
        <label class="block mb-1 font-medium text-gray-700">Business Email Address</label>
        <input type="email" name="business_email" class="w-full p-3 border border-gray-300 rounded-lg" required>
      </div>
  
       <div class="mb-6">
        <label class="block mb-1 font-medium text-gray-700">Business Password</label>
        <input type="password" name="business_password" class="w-full p-3 border border-gray-300 rounded-lg" required>
      </div>

     <button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-blue-500 text-white py-3 rounded-lg font-semibold hover:scale-105 transition">Start Free Trial</button>
    </form>
  </section>
</div>
@endsection
