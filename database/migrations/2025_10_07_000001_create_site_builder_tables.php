<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('site_settings')) {
            Schema::create('site_settings', function (Blueprint $table) {
                $table->id();
                $table->boolean('is_multilingual')->default(true);
                $table->string('default_locale')->default('ru');
                $table->json('locales')->nullable();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('pages')) {
            Schema::create('pages', function (Blueprint $table) {
                $table->id();
                $table->string('slug')->unique();
                $table->json('title');
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('blocks')) {
            Schema::create('blocks', function (Blueprint $table) {
                $table->id();
                $table->foreignId('page_id')->constrained()->cascadeOnDelete();
                $table->string('type');
                $table->boolean('enabled')->default(true);
                $table->unsignedInteger('sort')->default(0);
                $table->json('content')->nullable();
                $table->timestamps();
                $table->index(['page_id', 'sort']);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('blocks');
        Schema::dropIfExists('pages');
        Schema::dropIfExists('site_settings');
    }
};


