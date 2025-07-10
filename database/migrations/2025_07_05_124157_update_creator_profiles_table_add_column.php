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
            // 1. Ubah display_name menjadi nickname
            $table->renameColumn('display_name', 'nickname');

            // 2. Ubah social_links menjadi youtube_url
            $table->renameColumn('social_links', 'youtube_url');

            // 3. Tambahkan facebook_url, twitter_url, instagram_url setelah youtube_url
            $table->string('facebook_url')->nullable()->after('youtube_url');
            $table->string('twitter_url')->nullable()->after('facebook_url');
            $table->string('instagram_url')->nullable()->after('twitter_url');

            // 4. Ubah image_url menjadi post_image
            $table->renameColumn('image_url', 'post_image');

            // 5. Tambahkan pp_url dan fotosampul_url setelah bio
            $table->string('pp_url')->nullable()->after('bio');
            $table->string('fotosampul_url')->nullable()->after('pp_url');

            // 6. Tambahkan job setelah fotosampul_url
            $table->string('job')->nullable()->after('fotosampul_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('creator_profiles', function (Blueprint $table) {
            // Rollback perubahan
            $table->renameColumn('nickname', 'display_name');
            $table->renameColumn('youtube_url', 'social_links');
            $table->renameColumn('post_image', 'image_url');

            $table->dropColumn([
                'facebook_url',
                'twitter_url',
                'instagram_url',
                'pp_url',
                'fotosampul_url',
                'job'
            ]);
        });
    }
};
