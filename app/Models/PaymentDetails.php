<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetails extends Model
{
 protected $fillable = [
    'user_id', 'payment_method', 'transaction_id', 'amount', 'status', 'response'
];

}
