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
            $table->string('titulo')->nullable();
            $table->text('descricao')->nullable();
            $table->integer('banheiros')->nullable()->default(0);
            $table->float('preco', 10, 0)->nullable()->default(0);
            $table->integer('ano')->nullable();
            $table->integer('andares')->nullable()->default(0);
            $table->float('area', 10, 0)->nullable()->default(0);
            $table->integer('quartos')->nullable()->default(0);
            $table->integer('suites')->nullable()->default(0);
            $table->integer('garagens')->nullable()->default(0);
            $table->integer('piscinas')->nullable()->default(0);
            $table->text('endereco')->nullable();
            $table->text('mapa')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->integer('views')->nullable()->default(0);
            $table->timestamps();
            $table->unsignedBigInteger('bairro_id')->index('fk_imovels_bairros1_idx');
            $table->unsignedBigInteger('condicao_id')->index('fk_imovels_condicaos1_idx');
            $table->unsignedBigInteger('tipo_de_imovel_id')->index('fk_imovels_tipo_de_imovels1_idx');
            $table->unsignedBigInteger('status_id')->index('fk_imovels_statuses1_idx');
            $table->unsignedBigInteger('corretor_id')->index('fk_imovels_users1_idx');
            $table->string('slug')->nullable();
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
