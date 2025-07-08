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
       schema::create('sales', function (Blueprint $table){
        $table->id();
        $table->string('customer_name')->nullable();
        $table->enum('payment_method',['cash','card','upi'])->default('cash');
        $table->decimal('total_amount',10,2);
        $table->timestamps();
       });
    }

 
    public function down(): void
    {
        //
    }
};
