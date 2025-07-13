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
   Schema::table('payment_setups', function (Blueprint $table) {
    $table->foreign('user_id')->references('id')->on('free_trials')->onDelete('cascade');

        // Optional: if it's a foreign key relationship
        // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('payment_setups', function (Blueprint $table) {
        $table->dropColumn('user_id');
    });
}

};
