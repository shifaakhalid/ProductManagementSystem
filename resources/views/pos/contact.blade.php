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
<div class="max-w-5xl mx-auto px-4 py-20 animate-fade-in-up">
  <h2 class="text-4xl font-bold gradient-text text-center mb-4">Contact Us</h2>
  <p class="text-center text-gray-600 mb-10">We're here to help. Send us a message and we'll get back to you shortly.</p>

  <div class="grid md:grid-cols-2 gap-10">
    <!-- Contact Info -->
    <div class="bg-white rounded-xl p-6 shadow-md">
      <h3 class="text-2xl font-semibold mb-4 text-blue-600">Get in Touch</h3>
      <p class="text-gray-700 mb-4">Whether you have a question about features, trials, pricing, or anything else — our team is ready to answer all your questions.</p>
      <p class="mb-2"><strong>Email:</strong>shifakhalid1809@gmail.com</p>
      <p class="mb-2"><strong>Phone:</strong> +92 318 0038826</p>
      <p><strong>Address:</strong> Office 21, Software Park, hyderabad, Pakistan</p>
    </div>

    <!-- Contact Form -->
    <div class="bg-white rounded-xl p-6 shadow-md">
      <h3 class="text-2xl font-semibold mb-4 text-pink-600">Send Us a Message</h3>
      <form action="#" method="POST" class="space-y-4">
        @csrf
        <div>
          <label class="block text-sm font-medium text-gray-700">Name</label>
          <input type="text" name="name" class="w-full p-3 border rounded-lg" required>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" name="email" class="w-full p-3 border rounded-lg" required>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Message</label>
          <textarea name="message" rows="4" class="w-full p-3 border rounded-lg" required></textarea>
        </div>
        <button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-blue-500 text-white py-3 rounded-lg font-semibold hover:scale-105 transition">Send Message</button>
      </form>
    </div>
  </div>
</div>
@endsection
