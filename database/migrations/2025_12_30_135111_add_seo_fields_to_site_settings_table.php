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
        Schema::table('site_settings', function (Blueprint $table) {
            $table->json('default_meta_tags')->nullable()->comment('Default meta tags for all pages');
            $table->string('default_meta_title')->nullable()->comment('Default meta title template');
            $table->text('default_meta_description')->nullable()->comment('Default meta description');
            $table->text('default_meta_keywords')->nullable()->comment('Default meta keywords');
            $table->string('og_image')->nullable()->comment('Default Open Graph image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'default_meta_tags',
                'default_meta_title',
                'default_meta_description',
                'default_meta_keywords',
                'og_image'
            ]);
        });
    }
};
