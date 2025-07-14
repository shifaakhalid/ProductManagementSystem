@extends('layouts.poslayout2')

@section('content')
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fadeInUp 1s ease-out both;
    }
</style>


{{-- <form action="{{ route('search') }}" id="search"> --}}
<div class=" container max-w-7xl mx-auto px-4 py-16 animate-fade-in-up ">
    <!--  Search Input -->
    <!-- Search Bar -->
    <div class="search relative mb-6 max-w-2xl mx-auto">
        <input type="search" id="search" name="search"
            class="w-full px-5 py-3 rounded-full border border-blue-300 focus:ring-2 focus:ring-pink-400 focus:outline-none shadow-md placeholder-gray-400"
            placeholder="🔍 Search products...">
        <div class="absolute right-5 top-1/2 transform -translate-y-1/2 text-gray-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
            </svg>
        </div>
    </div>
    {{-- </form> --}}
    <!-- products -->
    @if ($products->count())
    <div id="all-products" class="  grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 px-4">
        @foreach ($products as $product)
        <div
            class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-5 flex flex-col">

            @if (!$product->image)
            <div
                class="h-44 w-full flex items-center justify-center bg-gradient-to-r from-pink-50 to-blue-50 rounded-xl mb-4">
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
                </button>

            </div>
        </div>
        @endforeach
    </div>
    <div id="search-result" class="flex flex-wrap gap-4 px-4">
    </div>
    <div id="pagination-links" class=" mt-10 px-4">
        {{ $products->links() }}
    </div>
    @else
    <p class="text-center text-gray-500 text-lg py-16">No products available.</p>
    @endif
</div>
@endsection
@section('scripts')
<script>
    let search = document.getElementById('search');

    search.addEventListener('keyup', function() {
        let value = this.value.trim();

        if (value === '') {
           
            document.getElementById('search-result').innerHTML = '';
            document.getElementById('all-products').style.display = 'grid';
            document.getElementById('pagination-links').style.display = 'block';
            return;
        }

       
        fetch(`/search?query=${encodeURIComponent(value)}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('search-result').innerHTML = data;

                document.getElementById('all-products').style.display = 'none';
                document.getElementById('pagination-links').style.display = 'none';
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });


function addToCart(productId) {
    fetch("{{ route('addToCart') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            product_id: productId
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            updateCartBadge(data.cartCount);
        } else {
            alert('❌ ' + data.message);
        }
    })
    .catch(error => console.error('Error adding to cart:', error));
    
}

   
</script>


@endsection