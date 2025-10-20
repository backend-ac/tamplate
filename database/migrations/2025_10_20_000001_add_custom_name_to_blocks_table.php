<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blocks', function (Blueprint $table) {
            $table->json('custom_name')->nullable()->after('type');
        });
    }

    public function down(): void
    {
        Schema::table('blocks', function (Blueprint $table) {
            $table->dropColumn('custom_name');
        });
    }
};
