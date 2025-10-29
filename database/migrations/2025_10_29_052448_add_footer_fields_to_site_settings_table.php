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
            $table->json('footer_contacts')->nullable()->after('body_metrics');
            $table->string('footer_copyright')->nullable()->after('footer_contacts');
            $table->string('footer_developer_text')->nullable()->after('footer_copyright');
            $table->string('footer_developer_link')->nullable()->after('footer_developer_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'footer_contacts',
                'footer_copyright',
                'footer_developer_text',
                'footer_developer_link',
            ]);
        });
    }
};
