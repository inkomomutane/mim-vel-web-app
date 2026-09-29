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
        Schema::table('banners', static function (Blueprint $table) {
            $table->string('ads_title')->nullable();
            $table->string('ads_subtitle')->nullable();
            $table->string('type')->default('ads')->nullable();
            $table->text('ads_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('banners', static function (Blueprint $table) {
            $table->dropColumn('ads_title');
            $table->dropColumn('ads_subtitle');
            $table->dropColumn('type');
            $table->dropColumn('ads_link');
        });
    }
};
