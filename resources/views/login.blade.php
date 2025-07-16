@extends('layouts.logo')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-pink-50 to-blue-100 px-4 py-12">
  <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Login to Your Account</h2>

    <form action="{{ route('loginMatch') }}" method="POST" class="space-y-5">
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
        <label for="email" class="block text-gray-600 mb-1">Email</label>
        <input id="email" type="email" name="email" required
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="you@example.com">
      </div>

      <div>
        <label for="password" class="block text-gray-600 mb-1">Password</label>
        <input id="password" type="password" name="password" required
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="••••••••">
      </div>

      <div class="flex justify-between items-center text-sm">
        <label class="flex items-center space-x-2">
          <input type="checkbox" class="form-checkbox text-blue-600">
          <span>Remember me</span>
        </label>
        <a href="#" class="text-blue-500 hover:underline">Forgot password?</a>
      </div>

      <button type="submit"
        class="w-full py-2 bg-pink-600 text-white font-semibold rounded-lg shadow-md hover:bg-pink-700 transition">
        Login
      </button>
    </form>

    <p class="mt-6 text-sm text-center text-gray-600">
      Don't have an account?
      <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
    </p>


  </div>
</div>
@endsection
