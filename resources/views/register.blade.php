@extends('layouts.logo')

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

<section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-pink-50 to-blue-100 px-4 py-12">
  <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl animate-fade-in-up">
    <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Create an Account</h2>

    <form method="POST" action="{{ route('registerSave') }}" class="space-y-5">
      @csrf
    @if ($errors->any())
    <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
      <ul class="list-disc pl-5 text-sm">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
      <div>
        <label for="name" class="block text-gray-700 mb-1 font-medium">Full Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
          placeholder="Your Name">
      </div>

      <div>
        <label for="email" class="block text-gray-700 mb-1 font-medium">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
          placeholder="you@example.com">
      </div>

      <div>
        <label for="password" class="block text-gray-700 mb-1 font-medium">Password</label>
        <input id="password" type="password" name="password" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
          placeholder="••••••••">
      </div>

      <div>
        <label for="password_confirmation" class="block text-gray-700 mb-1 font-medium">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
          placeholder="••••••••">
      </div>

      <button type="submit"
        class="w-full py-2 bg-gradient-to-r from-pink-500 to-blue-500 text-white font-semibold rounded-lg shadow-md hover:scale-105 transition">
        Register
      </button>
    </form>

    <p class="mt-6 text-sm text-center text-gray-600">
      Already have an account?
      <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
    </p>
  </div>
</section>
@endsection
