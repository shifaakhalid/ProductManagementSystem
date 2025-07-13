@extends('layouts.poslayout2')

@section('content')

<form method="POST"  action="{{ route('onboarding.payment.details.store')}}" class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
    @csrf

    {{-- @if(in_array('digital_wallet', $method)) --}}
    <div class="border-t pt-6">
        <h4 class="text-lg font-semibold mb-4 text-blue-700">📱 Easypaisa Account Setup</h4>

        <div class="mb-4">
            <label class="block font-medium mb-1">Account Holder Name</label>
            <input type="text" name="wallet_name" class="w-full border rounded px-4 py-2" placeholder="e.g., Ali Khan" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Mobile Number (Easypaisa)</label>
            <input type="text" name="wallet_number" class="w-full border rounded px-4 py-2" placeholder="e.g., 03XXXXXXXXX" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">CNIC / Business Name (Optional)</label>
            <input type="text" name="wallet_reference" class="w-full border rounded px-4 py-2" placeholder="e.g., 42101-1234567-1 or My Store">
        </div>
    </div>
    {{-- @endif --}}

    <div class="mt-6">
        <button type="submit" class="bg-gradient-to-r from-pink-500 to-blue-500 text-white px-6 py-2 rounded-full hover:scale-105 transition">
            Save & Continue
        </button>
    </div>
</form>

@endsection
