<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenuniasImovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denunias_imovels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('denuncia_id')->nullable()->index('fk_denuncia_has_imovel_denuncia1_idx');
            $table->unsignedBigInteger('imovel_id')->nullable()->index('fk_denuncia_has_imovel_imovel1_idx');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('denunias_imovels');
    }
}
