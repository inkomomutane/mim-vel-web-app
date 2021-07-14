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
            $table->string('nome_cliente')->nullable();
            $table->string('contacto')->nullable();
            $table->timestamp('horario')->nullable();
            $table->string('local_de_encontro')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('corretor_id')->nullable()->index('fk_agenda_users1_idx');
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
