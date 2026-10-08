<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::rename(
            'imovel_fors',
            'property_fors',
        );

        Schema::table('property_fors', function (Blueprint $table) {
            $table->renameColumn(
                'slug',
                'slug',
            );
        });
    }

    public function down(): void
    {
        Schema::table('property_fors', function (Blueprint $table) {
            $table->renameColumn(
                'slug',
                'slug',
            );
        });

        Schema::rename(
            'property_fors',
            'imovel_fors',
        );
    }
};
