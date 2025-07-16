<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product Manager</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

  <!-- Header -->
  <header class="w-full flex items-center justify-between px-6 py-4 bg-white shadow-md">
    <div class="flex items-center space-x-3">
      <img src="{{ asset('Assets/logo1.png') }}" alt="Logo" class="w-10 h-10 object-contain">
      <h1 class="text-xl md:text-2xl font-bold text-gray-800">Product Manager</h1>
    </div>
  </header>

  <!-- Main Content -->
  <main class="">
    <div class="">
      @yield('content')
    </div>
  </main>

</body>
</html>
