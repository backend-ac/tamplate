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
        Schema::table('pages', function (Blueprint $table) {
            $table->json('meta_tags')->nullable()->comment('Page-specific meta tags');
            $table->string('meta_title')->nullable()->comment('Page-specific meta title');
            $table->text('meta_description')->nullable()->comment('Page-specific meta description');
            $table->text('meta_keywords')->nullable()->comment('Page-specific meta keywords');
            $table->string('og_image')->nullable()->comment('Page-specific Open Graph image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn([
                'meta_tags',
                'meta_title',
                'meta_description',
                'meta_keywords',
                'og_image'
            ]);
        });
    }
};
