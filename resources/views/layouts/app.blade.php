

<!DOCTYPE html>
<html>
<head>
    <title>Product Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    {{-- Navigation Bar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('products.index') }}">Product Management System</a>
            <div>
                <a class="btn btn-outline-light" href="{{ route('products.create') }}">+ Add Product</a>
            </div>
        </div>
    </nav>

    {{-- Page Content --}}
    <main class="flex-fill container mb-5">
        @if(session(key: 'success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <div class="container">
            <small>&copy; {{ now()->year }} Product Management System | Built with Laravel & Bootstrap</small>
        </div>
    </footer>

</body>
</html>
