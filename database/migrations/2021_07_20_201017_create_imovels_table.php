<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imovels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('descricao')->nullable();
            $table->double('preco')->nullable();
            $table->year('ano')->nullable();
            $table->integer('andar')->nullable();
            $table->double('area')->nullable();
            $table->integer('quartos')->nullable();
            $table->integer('suites')->nullable();
            $table->integer('garagens')->nullable();
            $table->integer('pcinas')->nullable();
            $table->text('endereco')->nullable();
            $table->text('mapa')->nullable();
            $table->unsignedBigInteger('condicao_id')->nullable()->index('fk_imovel_condicao1_idx');
            $table->unsignedBigInteger('bairro_id')->nullable()->index('fk_imovel_bairro2_idx');
            $table->unsignedBigInteger('cidade_id')->nullable()->index('fk_imovel_cidade1_idx');
            $table->unsignedBigInteger('tipo_de_imovel_id')->nullable()->index('fk_imovel_tipo_de_imovel1_idx');
            $table->unsignedBigInteger('status_id')->nullable()->index('fk_imovel_status1_idx');
            $table->integer('views')->nullable()->default(0);
            $table->double('rating')->nullable()->default(0);
            $table->unsignedBigInteger('postado_por')->nullable()->index('fk_imovel_users1_idx');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imovels');
    }
}
