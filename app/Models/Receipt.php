<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
protected $fillable = [
    'customer_name',
    'email',
    'products',
    'subtotal',
    'taxAmount',
    'total_amount',
    'payment_method',
    'payment_status',
    'transaction_id',
];
}
