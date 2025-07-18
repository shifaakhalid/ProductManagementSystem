@if (session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif
@if (session('error'))
    <p style="color: red">{{ session('error') }}</p>
@endif

<form action="{{ route('stripe.pay') }}" method="POST">
    @csrf

    <script
        src="https://checkout.stripe.com/checkout.js"
        class="stripe-button"
        data-key="{{ config('stripe.key') }}"
        data-amount="1000"
        data-name="Stripe Demo"
        data-description="Laravel Stripe Payment"
        data-currency="usd">
    </script>
</form>

