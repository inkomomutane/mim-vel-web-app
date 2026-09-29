<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::rename(
            'condicaos',
            'property_conditions',
        );

        Schema::table('property_conditions', static function (Blueprint $table) {
            $table->renameColumn(
                'nome',
                'name',
            );
        });
    }

    public function down(): void
    {
        Schema::table('property_conditions', function (Blueprint $table) {
            $table->renameColumn(
                'name',
                'nome',
            );
        });

        Schema::rename(
            'property_conditions',
            'condicaos',
        );
    }
};
