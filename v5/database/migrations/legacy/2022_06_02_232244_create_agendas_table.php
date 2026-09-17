<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_do_cliente')->nullable();
            $table->timestamps();
            $table->string('local')->nullable();
            $table->string('contacto', 15)->nullable();
            $table->timestamp('data_hora')->nullable();
            $table->unsignedBigInteger('corretor_id')->index('fk_agendas_users1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
}
