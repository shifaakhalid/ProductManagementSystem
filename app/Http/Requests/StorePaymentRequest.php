<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
     'payment_method' => 'required|in:bank,easypaisa,jazzcash',

    // Easypaisa
    'easypaisa_account_name'    => 'required_if:payment_method,easypaisa|max:255',
    'easypaisa_account_number'  => 'required_if:payment_method,easypaisa|digits_between:10,13',
    'easypaisa_account_reference' => 'nullable|string|max:255',

    // Jazzcash
    'jazzcash_account_name'    => 'required_if:payment_method,jazzcash|max:255',
    'jazzcash_account_number'  => 'required_if:payment_method,jazzcash|digits_between:10,13',

    // Bank
    'bank_title'  => 'required_if:payment_method,bank|max:255',
    'bank_name'   => 'required_if:payment_method,bank|max:255',
    'bank_number' => 'required_if:payment_method,bank|digits_between:10,16',
    'wallet_reference' => 'nullable|string|max:255',
        ];
    }
}
