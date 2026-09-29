<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::rename(
            'politicas',
            'policies',
        );

        Schema::table('policies', function (Blueprint $table) {
            $table->renameColumn(
                'politicas',
                'content',
            );
        });
    }

    public function down(): void
    {
        Schema::table('policies', function (Blueprint $table) {
            $table->renameColumn(
                'content',
                'politicas',
            );
        });

        Schema::rename(
            'policies',
            'politicas',
        );
    }
};
