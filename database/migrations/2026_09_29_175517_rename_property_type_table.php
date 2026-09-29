<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::rename(
            'tipo_de_imovels',
            'property_types',
        );

        Schema::table('property_types', function (Blueprint $table) {
            $table->renameColumn(
                'nome',
                'name',
            );
        });
    }

    public function down(): void
    {
        Schema::table('property_types', function (Blueprint $table) {
            $table->renameColumn(
                'name',
                'nome',
            );
        });

        Schema::rename(
            'property_types',
            'tipo_de_imovels',
        );
    }
};
