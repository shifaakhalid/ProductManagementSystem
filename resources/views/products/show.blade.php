@extends('layouts.app2')

@section('content')
<style>
  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to   { opacity: 1; transform: translateY(0); }
  }
  .animate-fade-in-up {
    animation: fadeInUp 0.8s ease-out both;
  }
</style>

<div class="min-h-screen bg-white flex flex-col lg:flex-row items-center justify-center px-7 py-18 gap-5 animate-fade-in-up">

  <!-- Product Image -->
  <div class="w-full max-w-sm bg-white-50 p-6 rounded-2xl shadow-lg text-center">
    @if (!empty($product->image))
      <img src="{{ asset('storage/' . $product->image) }}"
           alt="Product Image"
           class="w-full h-auto object-contain rounded mb-4">
    @else
      <p class="text-gray-500">No image available.</p>
    @endif
  </div>

  <!-- Product Info -->
  <div class="w-full max-w-xl bg-white p-8 rounded-2xl shadow-lg">
    <h2 class="text-3xl font-extrabold text-gray-800 mb-4">{{ $product->name ?? 'No Name' }}</h2>

    <div class="space-y-2 text-base text-gray-700">
      <p><span class="font-semibold text-gray-800">SKU:</span> {{ $product->sku ?? 'N/A' }}</p>
      <p><span class="font-semibold text-gray-800">Price:</span> ${{ $product->price ?? '0.00' }}</p>
      <p><span class="font-semibold text-gray-800">Stock:</span> {{ $product->stock ?? '0' }}</p>
      <p><span class="font-semibold text-gray-800">Category:</span> {{ $product->category->name ?? 'N/A' }}</p>
      <p><span class="font-semibold text-gray-800">Supplier:</span> {{ $product->supplier->name ?? 'N/A' }}</p>
    </div>

    <!-- Buttons -->
    <div class="flex flex-wrap gap-4 mt-6">
      <a href="{{ route('products.edit', $product->id) }}"
         class="px-6 py-2 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold rounded-full shadow-md hover:scale-105 transition">
          Edit
      </a>

      <form method="POST" action="{{ route('products.destroy', $product->id) }}"
            onsubmit="return confirm('Are you sure you want to delete this product?')">
        @csrf
        @method('DELETE')
        <button type="submit"
                class="px-6 py-2 bg-gradient-to-r from-red-500 to-pink-500 text-white font-semibold rounded-full shadow-md hover:scale-105 transition">
          Delete
        </button>
      </form>
    </div>
  </div>

</div>

  <footer class="text-center text-sm text-gray-500 py-4">
    &copy; {{ now()->year }} Product Manager. All rights reserved.
  </footer>
@endsection
