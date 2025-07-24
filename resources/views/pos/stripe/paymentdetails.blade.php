@extends('layouts.poslayout2')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl w-full space-y-8 bg-white p-8 rounded-2xl shadow-lg">

        <!-- @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded-md">{{ session('success') }}</div>
        @endif
        @if (session('error'))
        <div class="bg-red-100 text-red-800 px-4 py-2 rounded-md">{{ session('error') }}</div>
        @endif -->

        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900">Checkout</h2>
        </div>
        @if (isset($products) && count($products))

        <div class="overflow-x-auto">
            <p class="mt-2 text-sm text-gray-600">Please review your items before proceeding to payment</p>

            <table class="min-w-full divide-y divide-gray-200 border rounded-lg">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Qty</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($products as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item['name'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item['quantity'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${{ number_format($item['price'], 2) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

<form method="POST" action="{{ route('stripe.receipt') }}" id="stripe-form">
    @csrf

    <div class="text-right">
        <h4 class="text-xl font-semibold">Total: ${{ number_format($totalWithTax, 2) }}</h4>
        <input type="hidden" name="totalWithTax" value="{{ $totalWithTax }}">
    </div>

    <input type="hidden" name="stripeToken" id="stripe-token">

    <div id="card-element"
        class="w-full p-4 border border-gray-300 rounded-lg shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-300"></div>

    <button class="mt-2 w-full py-2 bg-gradient-to-r from-pink-500 to-blue-500 text-white font-semibold rounded-lg shadow-md hover:scale-105 transition"
        type="button" onclick="createToken()">Pay Now</button>
</form>

        @else
        <div class="text-center py-10">
            <p class="text-gray-500 text-lg">Your cart is empty.</p>
        </div>
        @endif
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe =  Stripe("{{ config('services.stripe.key') }}");
    var elements = stripe.elements();
    var card = elements.create('card');
    card.mount('#card-element');

    function createToken() {
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                alert(result.error.message);
            } else {
                // Set token in hidden input
                document.getElementById('stripe-token').value = result.token.id;
                // Submit the form
                document.getElementById('stripe-form').submit();
            }
        });
    }
</script>




<!-- <script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
    var stripe = Stripe('{{ env("STRIPE_KEY") }}');

    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');


    function createToken() {
        stripe.createToken(cardElement).then(function(result) {
            console.log(result);
            if (result.token) {
                document.getElementById("stripe-token").value = result.token.id;
                document.getElementById("stripe-form").submit();

            }
        });
    } -->

    <!-- fetch("/receipt/store", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            transaction_id: "txn_123"
        })
    })
</script> -->



@endsection