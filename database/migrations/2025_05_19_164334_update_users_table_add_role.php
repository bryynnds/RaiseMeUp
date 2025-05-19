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
        Schema::table('users', function (Blueprint $table) {
            // Hapus kolom yang tidak kamu pakai
            $table->dropColumn(['email_verified_at', 'remember_token']);

            // Tambahkan kolom 'role'
            $table->enum('role', ['admin', 'kreator', 'supporter'])->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kembali kolom yang dihapus jika rollback
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            // Hapus kolom 'role'
            $table->dropColumn('role');
        });
    }
};
