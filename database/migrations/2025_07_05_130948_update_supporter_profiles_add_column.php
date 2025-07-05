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
        Schema::table('supporter_profiles', function (Blueprint $table) {
            $table->renameColumn('display_name', 'nickname');
            $table->string('pp_url')->nullable()->after('bio');
            $table->string('fotosampul_url')->nullable()->after('pp_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('supporter_profiles', function (Blueprint $table) {
            $table->renameColumn('nickname', 'display_name');
            $table->dropColumn([
                'pp_url',
                'fotosampul_url'
            ]);
        });
    }
};
