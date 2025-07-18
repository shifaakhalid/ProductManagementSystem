<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {  
           $table->id();
           $table->string('name');
           $table->string('sku', 191)->unique();;
           $table->unsignedInteger('stock');
           $table->decimal('price', 10, 2);
           $table->string('image')->nullable();
        $table->foreignId('categories_id')->nullable()->constrained()->nullOnDelete();
           $table->foreignId('suppliers_id')->nullable()->constrained()->nullOnDelete();
           $table->timestamps();
}); }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
