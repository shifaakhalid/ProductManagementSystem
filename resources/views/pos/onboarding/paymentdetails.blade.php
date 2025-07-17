@extends('layouts.poslayout2')

@section('content')

<form method="POST" action="{{ route('onboarding.payment.details.store') }}" class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow space-y-6">
    @csrf

    <h2 class="text-xl font-semibold text-blue-600">💳 Choose Payment Method</h2>

    <!-- Payment Method Dropdown -->
    <div>
        <label class="block font-medium mb-1">Select Payment Method</label>
        <select id="payment-method" name="payment_method" class="w-full border rounded px-4 py-2">
            <option value="">-- Select Method --</option>
            <option value="easypaisa" name="easypaisa">Easypaisa</option>
            <option value="jazzcash" name="jazzcash">JazzCash</option>
            <option value="bank" name="bank">Bank Transfer</option>
        </select>
    </div>

    <!-- Easypaisa Fields -->
    <div id="easypaisa-fields" class="hidden">
        <h4 class="text-lg font-semibold mb-4 text-pink-600">📱 Easypaisa Details</h4>

        <div class="mb-4">
            <label class="block font-medium mb-1">Account Holder Name</label>
            <input type="text" name="easypaisa_account_name" class="w-full border rounded px-4 py-2" placeholder="e.g., Ali Khan">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Mobile Number</label>
            <input type="text" name="easypaisa_account_number" class="w-full border rounded px-4 py-2" placeholder="e.g., 03XXXXXXXXX">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">CNIC / Business Name (Optional)</label>
            <input type="text" name="easypaisa_account_reference" class="w-full border rounded px-4 py-2" placeholder="42101-1234567-1 or My Store">
        </div>
    </div>

    <!-- JazzCash Fields -->
    <div id="jazzcash-fields" class="hidden">
        <h4 class="text-lg font-semibold mb-4 text-pink-600">📲 JazzCash Details</h4>

        <div class="mb-4">
            <label class="block font-medium mb-1">Account Holder Name</label>
            <input type="text" name="jazzcash_account_name" class="w-full border rounded px-4 py-2" placeholder="e.g., Sana Malik">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Mobile Number</label>
            <input type="text" name="jazzcash_account_number" class="w-full border rounded px-4 py-2" placeholder="e.g., 03XXXXXXXXX">
        </div>
    </div>

    <!-- Bank Fields -->
    <div id="bank-fields" class="hidden">
        <h4 class="text-lg font-semibold mb-4 text-pink-600">🏦 Bank Account Details</h4>

        <div class="mb-4">
            <label class="block font-medium mb-1">Account Title</label>
            <input type="text" name="bank_title" class="w-full border rounded px-4 py-2" placeholder="e.g., Muhammad Usman">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Bank Name</label>
            <input type="text" name="bank_name" class="w-full border rounded px-4 py-2" placeholder="e.g., Meezan Bank">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Account Number / IBAN</label>
            <input type="text" name="bank_number" class="w-full border rounded px-4 py-2" placeholder="e.g., PK12MEZN1234567890123456">
        </div>
    </div>

    <div class="pt-4">
        <button type="submit" class="bg-gradient-to-r from-pink-500 to-blue-500 text-white px-6 py-2 rounded-full hover:scale-105 transition">
            Save & Continue
        </button>
    </div>
</form>

@endsection

@section('scripts')
<script>
    document.getElementById('payment-method').addEventListener('change', function () {
        const method = this.value;

        // Hide all sections first
        document.getElementById('easypaisa-fields').classList.add('hidden');
        document.getElementById('jazzcash-fields').classList.add('hidden');
        document.getElementById('bank-fields').classList.add('hidden');

        // Show selected section
        if (method === 'easypaisa') {
            document.getElementById('easypaisa-fields').classList.remove('hidden');
        } else if (method === 'jazzcash') {
            document.getElementById('jazzcash-fields').classList.remove('hidden');
        } else if (method === 'bank') {
            document.getElementById('bank-fields').classList.remove('hidden');
        }
    });
</script>
@endsection
