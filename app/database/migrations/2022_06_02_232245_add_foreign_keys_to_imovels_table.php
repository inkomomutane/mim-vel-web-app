<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToImovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imovels', function (Blueprint $table) {
            $table->foreign(['bairro_id'], 'fk_imovels_bairros1')->references(['id'])->on('bairros')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['condicao_id'], 'fk_imovels_condicaos1')->references(['id'])->on('condicaos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['status_id'], 'fk_imovels_statuses1')->references(['id'])->on('statuses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['tipo_de_imovel_id'], 'fk_imovels_tipo_de_imovels1')->references(['id'])->on('tipo_de_imovels')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['corretor_id'], 'fk_imovels_users1')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imovels', function (Blueprint $table) {
            $table->dropForeign('fk_imovels_bairros1');
            $table->dropForeign('fk_imovels_condicaos1');
            $table->dropForeign('fk_imovels_statuses1');
            $table->dropForeign('fk_imovels_tipo_de_imovels1');
            $table->dropForeign('fk_imovels_users1');
        });
    }
}
