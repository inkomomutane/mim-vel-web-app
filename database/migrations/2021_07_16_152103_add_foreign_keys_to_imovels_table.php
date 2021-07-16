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
            $table->foreign('bairro_id', 'fk_imovel_bairro2')->references('id')->on('bairros')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('cidade_id', 'fk_imovel_cidade1')->references('id')->on('cidades')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('condicao_id', 'fk_imovel_condicao1')->references('id')->on('condicaos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('status_id', 'fk_imovel_status1')->references('id')->on('statuses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('tipo_de_imovel_id', 'fk_imovel_tipo_de_imovel1')->references('id')->on('tipo_de_imovels')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('postado_por', 'fk_imovel_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
            $table->dropForeign('fk_imovel_bairro2');
            $table->dropForeign('fk_imovel_cidade1');
            $table->dropForeign('fk_imovel_condicao1');
            $table->dropForeign('fk_imovel_status1');
            $table->dropForeign('fk_imovel_tipo_de_imovel1');
            $table->dropForeign('fk_imovel_users1');
        });
    }
}
