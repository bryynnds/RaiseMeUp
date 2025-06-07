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
            $table->string('display_name')->nullable()->after('user_id');
            $table->text('social_links')->nullable()->after('image_url');
            $table->decimal('goal_amount', 12, 2)->nullable()->after('social_links');
            $table->decimal('current_amount', 12, 2)->nullable()->after('goal_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('creator_profiles', function (Blueprint $table) {
            $table->dropColumn(['display_name', 'social_links', 'goal_amount', 'current_amount']);
        });
    }
};
