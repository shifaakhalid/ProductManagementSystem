@extends('layouts.poslayout2')

@section('content')
<div id="cart" class="space-y-4">
    @forelse ($cart as $id => $item)
    <div class="flex items-center justify-between bg-white rounded-2xl shadow p-4">
        <!-- Image -->
        <div class="w-20 h-20 rounded overflow-hidden mr-4">
            @if (!empty($item['image']))
            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
            @else
            <div class="w-full h-full bg-gray-200 flex items-center justify-center text-sm text-gray-500">
                No Image
            </div>
            @endif
        </div>

        <!-- Product Info -->
        <div class="flex-1">
            <p class="text-lg font-semibold text-gray-700">{{ $item['name'] }}</p>
            <p class="text-sm text-gray-500">Price: Rs. {{ $item['price'] }}</p>

            <!-- Quantity Controls -->
            <div class="mt-2 flex items-center space-x-2">
                <button onclick="update({{ $id }}, 'decrease')" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">-</button>
                <span id="quantity-{{ $id }}" class="px-3 text-gray-700 font-medium">{{ $item['quantity'] }}</span>
                <button onclick="update({{ $id }}, 'increase')" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
            </div>

            <!-- Total Price -->
            <p class="text-sm text-gray-500 mt-2">
                Total: <span id="total-{{ $id }}" class="font-semibold text-pink-600">Rs. {{ $item['price'] * $item['quantity'] }}</span>
            </p>
        </div>

        <!-- Remove Button -->
        <div>
            <button onclick="removeFromCart({{ $id }})" class="text-red-500 hover:text-red-700 text-sm">Remove</button>
        </div>
    </div>
    @empty
    <div class="text-center text-gray-400 text-lg py-16">🛒 Your cart is empty.</div>
    @endforelse
</div>
{{-- Footer with tax --}}
@if (!empty($cart))
@php
$subtotal = 0;
foreach ($cart as $item) {
$subtotal += $item['price'] * $item['quantity'];
}
$taxRate = 0.13; // 13% Tax
$taxAmount = $subtotal * $taxRate;
$totalWithTax = $subtotal + $taxAmount;
@endphp

<div class="fixed bottom-0 left-0 right-0 bg-white border-t shadow-md px-6 py-4 z-50">
    <div class="flex justify-between items-center text-sm text-gray-600">
        <div>
            <p>Subtotal: <span id="footer-subtotal" class="font-medium text-gray-800">Rs. {{ number_format($subtotal, 2) }}</span></p>
            <p>Tax (13%): <span id="footer-tax" class="font-medium text-yellow-600">Rs. {{ number_format($taxAmount, 2) }}</span></p>
            <p class="mt-1 font-semibold text-lg text-pink-600">Total: <span id="footer-total">Rs. {{ number_format($totalWithTax, 2) }}</span></p>

        </div>
        <div>
            <a href=""
                class="bg-gradient-to-r from-blue-500 to-pink-500 text-white px-5 py-2 rounded-full shadow hover:scale-105 transition">
                Proceed to Checkout
            </a>
        </div>
    </div>
</div>
@endif
@endsection
@section('scripts')
<script>
    function removeFromCart(productId) {
        fetch(`/cart/remove`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    product_id: productId
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                     updateCartBadge(data.cartCount);
                    location.reload(); 
                } else {
                    alert(data.message || 'Failed to remove item from cart.');
                }
            })
            .catch(error => {
                console.error("Error removing item from cart:", error);
            });
    }

    function update(productId, action) {
        fetch("{{ route('cart.update') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    product_id: productId,
                    action: action
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    document.getElementById(`quantity-${productId}`).innerText = data.quantity;
                    document.getElementById(`total-${productId}`).innerText = 'Rs. ' + data.total;
                    document.getElementById('footer-subtotal').innerText = 'Rs. ' + data.subtotal;
                    document.getElementById('footer-tax').innerText = 'Rs. ' + data.tax;
                    document.getElementById('footer-total').innerText = 'Rs. ' + data.grand_total;


                  
                } else {
                    alert(data.message || 'Failed to update quantity.');
                }
            })
            .catch(error => {
                console.error("Error updating quantity:", error);
            });
    }

 
</script>


@endsection