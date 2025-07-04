<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

@extends('layouts.logo')
@section('content')

<body class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Login to Your Account</h2>
    <form action="{{route('loginMatch')}}" method="POST" class="space-y-5">
      @csrf
      <div>
        <label class="block text-gray-600 mb-1" for="email">Email</label>
        <input
          id="email"
          type="email"
          name="email"
          required
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="you@example.com">
      </div>
      <div>
        <label class="block text-gray-600 mb-1" for="password">Password</label>
        <input
          id="password"
          type="password"
          name="password"
          required
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
      <button
        type="submit"
        class="w-full py-2 bg-pink-600 text-white font-semibold rounded-lg shadow-md hover:bg-pink-700 transition">
        Login
      </button>
    </form>
    <p class="mt-6 text-sm text-center text-gray-600">
      Don't have an account?
      <a href="#" class="text-blue-500 hover:underline">Register</a>
    </p>
  </div>

  @if ($errors->any())
  <div class="card-footer text-body-secondary">
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  </div>
  @endif
  @endsection


</body>

</html>