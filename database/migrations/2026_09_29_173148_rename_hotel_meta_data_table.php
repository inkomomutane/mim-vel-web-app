<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('hotel_meta_datas', function (Blueprint $table) {
            $table->renameColumn(
                'tipo_de_imovel_id',
                'property_type_id',
            );

            $table->renameColumn(
                'condicao_id',
                'property_condition_id',
            );

            $table->renameColumn(
                'bairro_id',
                'neighborhood_id',
            );
        });
    }

    public function down(): void
    {
        Schema::table('hotel_meta_datas', function (Blueprint $table) {
            $table->renameColumn(
                'property_type_id',
                'tipo_de_imovel_id',
            );

            $table->renameColumn(
                'property_condition_id',
                'condicao_id',
            );

            $table->renameColumn(
                'neighborhood_id',
                'bairro_id',
            );
        });
    }
};
