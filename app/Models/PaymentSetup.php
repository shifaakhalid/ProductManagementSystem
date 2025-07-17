<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSetup extends Model
{
  protected $fillable = [
    'user_id',
        'method',
        'easypaisa_account_name',
        'easypaisa_account_number',
        'easypaisa_account_reference',
        'jazzcash_account_name',
        'jazzcash_account_number',
        'bank_title',
        'bank_name',
        'bank_number',

];
}
