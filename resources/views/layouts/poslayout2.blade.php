<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-pink-50 via-white to-blue-50 text-gray-800 font-sans">

  <!-- Navbar -->
  <header class="bg-white/80 backdrop-blur shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-3xl font-bold gradient-text">SaleMart</h1>
      <nav class="space-x-6 text-gray-700 font-medium">
      <nav class="flex items-center space-x-6 text-gray-700 font-medium">

    {{-- Home --}}
    <a href="{{ route('home') }}" class="flex items-center gap-1 hover:text-pink-600 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10l9-7 9 7v10a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V12H9v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V10z" />
        </svg>
        <span>Home</span>
    </a>

    {{-- Products --}}
    <a href="{{ route('shop') }}" class="flex items-center gap-1 hover:text-pink-600 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a1 1 0 0 0-1-1h-5.382a1 1 0 0 1-.894-.553L11.618 2.447A1 1 0 0 0 10.724 2H5a1 1 0 0 0-1 1v6m16 4H4m16 0a2 2 0 0 1 2 2v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-5a2 2 0 0 1 2-2m14 0v0z" />
        </svg>
        <span>Products</span>
    </a>

    {{-- Cart --}}
    <a href="" class="flex items-center gap-1 hover:text-pink-600 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 5h12m-4 0a1 1 0 1 1-2 0m4 0a1 1 0 1 1-2 0" />
        </svg>
        <span>Cart</span>
    </a>

</nav>

      </nav>
    </div>
  </header>

  <!-- Main Content -->
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