<?php

namespace App\Models;
use App\Models\category;
use App\Models\Supplier;
use App\Models\StockMovement;
use App\Models\TransactionItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','stock','sku','price','category_id','suppliers_id','image'];
    public function category(){
        return $this->belongsTo(category::class);
    }

    public function supplier(){
    return $this->belongsTo(Supplier::class);
}

    public function stockMovements() {
    return $this->hasMany(StockMovement::class);
}

     public function transactionItems() {
    return $this->hasMany(TransactionItem::class);
}
}