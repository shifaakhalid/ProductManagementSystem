@extends('layouts.app2')

@section('content')
<div class="w-full min-h-screen bg-white px-6 py-12 flex flex-col lg:flex-row items-start lg:items-center justify-center gap-10">

  
    <div class="w-full lg:w-1/3 flex justify-center">
        <div class="bg-gray-100 p-6 rounded-xl shadow-md">
            @if (!empty($product->image))
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="w-64 h-auto object-contain rounded">
            @else
                <p class="text-gray-500 text-center">No image available.</p>
            @endif
        </div>
    </div>

  
    <div class="w-full lg:w-2/3 flex justify-start">
        <div class="space-y-4 w-full max-w-xl">
            <h2 class="text-4xl font-bold text-gray-800">{{ $product->name ?? 'No Name' }}</h2>

            <div class="text-base text-gray-700 space-y-1">
                <p><span class="font-semibold">SKU:</span> {{ $product->sku ?? 'N/A' }}</p>
                <p><span class="font-semibold">Price:</span> ${{ $product->price ?? '0.00' }}</p>
                <p><span class="font-semibold">Stock:</span> {{ $product->stock ?? '0' }}</p>
                <p><span class="font-semibold">Category:</span> {{ $product->category->name ?? 'N/A' }}</p>
                <p><span class="font-semibold">Supplier:</span> {{ $product->supplier->name ?? 'N/A' }}</p>
            </div>

        
            <div class="flex flex-wrap gap-4 pt-4">
                <a href="{{ route('products.edit', $product->id) }}"
                    class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Edit
                </a>

                <form method="POST" action="{{ route('products.destroy', $product->id) }}"
                    onsubmit="return confirm('Are you sure you want to delete this product?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-5 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
