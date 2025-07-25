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
        Schema::table('donations', function (Blueprint $table) {
            $table->dropColumn(['payment_method', 'midtrans_order_id', 'transaction_status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_method')->nullable()->after('message');
            $table->string('midtrans_order_id')->nullable()->after('payment_method');
            $table->string('transaction_status')->nullable()->after('midtrans_order_id')->default('pending');
        });
    }
};
