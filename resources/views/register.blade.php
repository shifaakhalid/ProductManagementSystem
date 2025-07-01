<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

@extends('layouts.logo')
@section('content')
<body class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="w-full max-w-md bg-white p-6 rounded-2xl shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Create an Account</h2>
    <form method="POST" action="{{ route('registerSave') }}" class="space-y-5">
      @csrf
      <div>
        <label class="block text-gray-600 mb-1" for="name">Full Name</label>
        <input
          id="name"
          type="text"
          name="name"
          value="{{ old('name') }}"
          required
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Your Name"
        >
      </div>
      <div>
        <label class="block text-gray-600 mb-1" for="email">Email</label>
        <input
          id="email"
          type="email"
          name="email"
          value="{{ old('email') }}"
          required
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="you@example.com"
        >
      </div>
      <div>
        <label class="block text-gray-600 mb-1" for="password">Password</label>
        <input
          id="password"
          type="password"
          name="password"
          required
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="••••••••"
        >
      </div>
      <div>
        <label class="block text-gray-600 mb-1" for="password_confirmation">Confirm Password</label>
        <input
          id="password_confirmation"
          type="password"
          name="password_confirmation"
          required
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="••••••••"
        >
      </div>
      <button
        type="submit"
        class="w-full py-2 bg-pink-600 text-white font-semibold rounded-lg shadow-md hover:bg-pink-700 transition">

        Register
      </button>
    </form>
    <p class="mt-6 text-sm text-center text-gray-600">
      Already have an account?
      <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
    </p>
  </div>
  @endsection
</body>
</html>
