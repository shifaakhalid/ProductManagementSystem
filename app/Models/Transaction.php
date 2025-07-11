<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
   protected $fillable = ['payment_method', 'total_amount'];

public function transactionItems() {
    return $this->hasMany(TransactionItem::class);
}

}
