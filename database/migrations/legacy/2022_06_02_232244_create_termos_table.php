<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::rename(
            'termos',
            'terms',
        );

        Schema::table('terms', function (Blueprint $table) {
            $table->renameColumn(
                'termos',
                'content',
            );
        });
    }

    public function down(): void
    {
        Schema::table('terms', function (Blueprint $table) {
            $table->renameColumn(
                'content',
                'termos',
            );
        });

        Schema::rename(
            'terms',
            'termos',
        );
    }
};
