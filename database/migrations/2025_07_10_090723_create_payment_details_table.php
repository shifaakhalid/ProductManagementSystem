<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up()
{
    Schema::create('payments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('free_trials')->onDelete('cascade');
        $table->string('payment_method');
        $table->string('transaction_id')->nullable();
        $table->decimal('amount', 10, 2);
        $table->string('status'); // success, failed, pending
        $table->json('response')->nullable(); // Optional: to store full gateway response
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_setups');
    }
};
