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
        Schema::create('payment_setups', function (Blueprint $table) {
            $table->id();
            $table->enum('method', ['easypaisa', 'jazzcash', 'bank']);
            $table->foreignId('user_id')->constrained('free_trials')->onDelete('cascade');
            $table->string('easypaisa_account_name')->nullable();
            $table->string('easypaisa_account_number')->nullable();
            $table->string('easypaisa_account_reference')->nullable();
            $table->string('jazzcash_account_name')->nullable();
            $table->string('jazzcash_account_number')->nullable();
            $table->string('bank_title')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_number')->nullable();
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
