<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDenuniasImovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('denunias_imovels', function (Blueprint $table) {
            $table->foreign('denuncia_id', 'fk_denuncia_has_imovel_denuncia1')->references('id')->on('denuncias')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('imovel_id', 'fk_denuncia_has_imovel_imovel1')->references('id')->on('imovels')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('denunias_imovels', function (Blueprint $table) {
            $table->dropForeign('fk_denuncia_has_imovel_denuncia1');
            $table->dropForeign('fk_denuncia_has_imovel_imovel1');
        });
    }
}
