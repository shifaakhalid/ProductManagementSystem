@extends('layouts.poslayout2')

@section('content')
<div class="max-w-2xl mx-auto py-16 px-4">
    <h2 class="text-3xl font-bold text-center gradient-text mb-8">📦 Add Your First Product</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form action="" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-xl shadow-lg space-y-6">
        @csrf

        <div>
            <label class="block font-semibold mb-1">Product Name</label>
            <input type="text" name="name" class="w-full border rounded px-4 py-2" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Price</label>
            <input type="number" name="price" step="0.01" class="w-full border rounded px-4 py-2" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Quantity</label>
            <input type="number" name="quantity" class="w-full border rounded px-4 py-2" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Product Image (optional)</label>
            <input type="file" name="image" class="w-full border rounded px-4 py-2">
        </div>

        <div class="text-center">
            <button type="submit" class="bg-gradient-to-r from-pink-500 to-blue-500 text-white font-semibold px-6 py-2 rounded-full hover:scale-105 transition">
                Add Product
            </button>
        </div>
    </form>
</div>
@endsection
