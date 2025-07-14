<div class="flex flex-wrap gap-4 px-4">
    <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-5 flex flex-col w-[280px]">
        @if (!$product->image)
            <div class="h-44 w-full flex items-center justify-center bg-gradient-to-r from-pink-50 to-blue-50 rounded-xl mb-4">
                <p class="text-gray-400 text-sm">No image</p>
            </div>
        @else
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                class="h-44 w-full object-cover rounded-xl mb-4 shadow-sm">
        @endif

        <h3 class="text-sm font-semibold text-gray-400 mb-1">{{ $product->sku }}</h3>
        <h3 class="text-xl font-semibold text-gray-800 mb-1">{{ $product->name }}</h3>
        <p class="text-sm text-gray-500 mb-3 line-clamp-2">{{ $product->description }}</p>

        <div class="mt-auto">
            <p class="text-pink-600 font-bold text-lg mb-3">Rs. {{ $product->price }}</p>
           <button onclick="addToCart({{ $product->id }})"
                class="w-full py-2 rounded-full bg-gradient-to-r from-pink-500 to-blue-500 text-white font-medium shadow-md hover:scale-105 transition">
                Add to Cart
            </button></a>
        </div>
    </div>
</div>
