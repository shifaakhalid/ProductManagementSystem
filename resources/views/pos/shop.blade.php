@extends('layouts.poslayout2')

@section('content')
<style>
  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to   { opacity: 1; transform: translateY(0); }
  }
  .animate-fade-in-up {
    animation: fadeInUp 1s ease-out both;
  }
</style>
<section class="max-w-7xl mx-auto px-4 py-16 animate-fade-in-up ">
  <h2 class="text-3xl font-bold gradient-text text-center mb-10 ">🛍️ Shop Products</h2>

  @if($products->count())
  <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach($products as $product)
    <div class="bg-white rounded-xl shadow-md p-4 hover:shadow-lg transition flex flex-col">
@if (!$product->image)
    <div class="h-40 w-full flex items-center justify-center bg-gray-100 rounded-md mb-3">
        <p class="text-gray-500 text-sm">No image</p>
    </div>
@else
    <img src="{{ asset('storage/' . $product->image) }}" class="h-40 w-full object-cover rounded-md mb-3" alt="{{ $product->name }}">
@endif
      <h3 class="text-lg font-bold text-gray-800">{{ $product->name }}</h3>
      <p class="text-sm text-gray-500 mb-2">{{ $product->description }}</p>

      <div class="mt-auto">
        <p class="text-blue-600 font-semibold text-lg mb-2">Rs. {{ $product->price }}</p>
        <button class="bg-pink-500 text-white px-4 py-2 rounded-lg w-full hover:bg-pink-600 transition">Add to Cart</button>
      </div>
    </div>
    @endforeach
  </div>

  <div class="mt-10">
    {{ $products->links() }} {{-- Pagination --}}
  </div>

  @else
  <p class="text-center text-gray-500">No products available.</p>
  @endif
</section>
@endsection
