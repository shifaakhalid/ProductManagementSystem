<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>POSMaster - Smart POS System</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @if(session('success'))
  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
    {{ session('success') }}
  </div>
  @endif
  <style>
    .gradient-text {
      background: linear-gradient(to right, #ec4899, #3b82f6);
      background-clip: text;
      -webkit-background-clip: text;

      color: transparent;
      -webkit-text-fill-color: transparent;

    }
  </style>
</head>

<body class="bg-gradient-to-br from-pink-50 via-white to-blue-50 text-gray-800 font-sans">


  <header class="bg-white/80 backdrop-blur shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-3xl font-bold gradient-text">SaleMart</h1>
      <nav class="space-x-6 text-gray-700 font-medium">
        <a href="{{route('home') }}" class="hover:text-pink-600">Home</a>
        <a href="{{route('features') }}" class="hover:text-pink-600">Features</a>
        <a href="{{route('pricing') }}" class="hover:text-pink-600">Pricing</a>
        <a href="{{route('contact') }}" class="hover:text-pink-600">Contact</a>
      </nav>
    </div>
  </header>


  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-gradient-to-r from-blue-500 to-pink-500 text-white py-8">
    <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
      <p class="text-sm">&copy; 2025 POSMaster. All rights reserved.</p>
      <div class="space-x-4 mt-3 md:mt-0">
        <a href="#" class="hover:underline">Privacy</a>
        <a href="#" class="hover:underline">Terms</a>
        <a href="#" class="hover:underline">Support</a>
      </div>
    </div>
  </footer>

  @yield('scripts')
</body>

</html>