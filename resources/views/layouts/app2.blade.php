<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Manager</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>


</head>
<body class="bg-white-50 text-gray-800 min-h-screen">

    <!-- Header -->
    <header class="flex items-center justify-between px-6 py-4 bg-white shadow">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('Assets/logo1.png') }}" alt="Logo" class="h-10 w-10 object-contain">
            <h1 class="text-xl font-bold text-blue-600">Product Manager</h1>
        </div>

        <div class="flex items-center space-x-4">
            <!-- Create Product -->
            <a href="{{ route('products.create') }}"
                class="px-4 py-2 border border-gray-300 text-gray-700 rounded-full hover:bg-gray-300 hover:text-white transition">
                +
            </a>

            <!-- Products Page -->
            <a href="{{ route('products.index') }}"
                class="px-5 py-2 border border-gray-300 rounded-lg text-black hover:bg-blue-500 hover:text-white transition">
                Products
            </a>

            <!-- Logout -->
            <a href="{{ route('login') }}"
                class="bg-pink-600 text-white px-5 py-2 rounded-lg hover:bg-white hover:text-black hover:border hover:border-gray-300 transition">
                Logout
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="px-6 py-6">
        @if(session('success'))
            <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>
