<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Product Manager</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
      animation: fadeInUp 1s ease-out both;
    }
  </style>
</head>

<body class="min-h-screen bg-gradient-to-br flex flex-col items-center justify-between">

  <header class="w-full flex justify-between items-center px-8 py-4 bg-white shadow-md">
    <div class="flex items-center space-x-4">
      <img src="{{ asset('Assets/logo1.png') }}" alt="Logo" class="w-10 h-10 object-contain">
      <h1 class="text-xl font-bold text-gray-800">Product Manager</h1>
    </div>
    <div class="space-x-3">
      <button onclick="window.location.href='/register'" class="window.location.href='/register px-6 py-2 bg-blue-400 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
        Register
      </button>
      <button onclick="window.location.href='/login'" class="px-6 py-2 bg-pink-600 text-white font-semibold rounded-lg shadow-md hover:bg-pink-700 transition">
        Login
      </button>
    </div>
  </header>

  
  <main class="flex flex-col md:flex-row items-center justify-between w-full max-w-6xl px-6 py-16 animate-fade-in-up">
    
    <div class="md:w-1/2 text-center md:text-left mb-10 md:mb-0">
      <h2 class="text-4xl font-extrabold text-gray-800 mb-4">Product Management System</h2>
      <p class="text-gray-600 leading-relaxed text-lg">
        A web-based application that allows users to add, update, view, and delete products efficiently. It manages product details like name, SKU, price, stock, image, category, and supplier, providing a streamlined way to organize and monitor inventory in real-time.
      </p>
    </div>

    <div class="max-w-sm flex justify-center">
      <img src="{{ asset('Assets/body-image.png') }}" alt="Dashboard Illustration" class="">
    </div>
  </main>


  <footer class="text-center text-sm text-gray-500 py-4">
    &copy; {{ now()->year }} Product Manager. All rights reserved.
  </footer>

</body>
</html>
