@extends('layouts.poslayout2')

@section('content')
@if(in_array('digital_wallet', $methods))
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
@endif
@endsection
