<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bairros', function (Blueprint $table) {
            $table->dropForeign('fk_bairros_cidades1');
        });

        Schema::rename('bairros', 'neighborhoods');

        Schema::table('neighborhoods', function (Blueprint $table) {
            $table->renameColumn('nome', 'name');
            $table->renameColumn('cidade_id', 'city_id');

            $table->renameIndex(
                'fk_bairros_cidades1_idx',
                'neighborhoods_city_id_index',
            );
        });

        Schema::table('neighborhoods', function (Blueprint $table) {
            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->noActionOnUpdate()
                ->noActionOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('neighborhoods', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
        });

        Schema::table('neighborhoods', function (Blueprint $table) {
            $table->renameColumn('name', 'nome');
            $table->renameColumn('city_id', 'cidade_id');

            $table->renameIndex(
                'neighborhoods_city_id_index',
                'fk_bairros_cidades1_idx',
            );
        });

        Schema::rename('neighborhoods', 'bairros');

        Schema::table('bairros', function (Blueprint $table) {
            $table->foreign(
                'cidade_id',
                'fk_bairros_cidades1',
            )
                ->references('id')
                ->on('cidades')
                ->noActionOnUpdate()
                ->noActionOnDelete();
        });
    }
};
