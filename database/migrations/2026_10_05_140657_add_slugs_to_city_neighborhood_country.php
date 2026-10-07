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
        $tables = [
            'countries',
            'provinces',
            'cities',
            'neighborhoods',
        ];

        foreach ($tables as $table) {
            Schema::table($table, static function (Blueprint $table) {
                $table->string('slug')->nullable()->unique();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'countries',
            'provinces',
            'cities',
            'neighborhoods',
        ];

        foreach ($tables as $table) {
            Schema::table($table, static function (Blueprint $table) {
                $table->dropColumn('slug');
            });
        }
    }
};
