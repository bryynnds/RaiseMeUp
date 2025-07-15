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
        Schema::table('creator_profiles', function (Blueprint $table) {
            $table->dropColumn('goal_amount');
            $table->renameColumn('current_amount', 'total_income');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('creator_profiles', function (Blueprint $table) {
            $table->decimal('goal_amount', 12, 2)->nullable(); // atau tipe asli sebelumnya
            $table->renameColumn('total_income', 'current_amount');
        });
    }
};
