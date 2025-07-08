<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['customer_name', 'customer_phone','payment_method', 'total_amount'];
    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }
}
