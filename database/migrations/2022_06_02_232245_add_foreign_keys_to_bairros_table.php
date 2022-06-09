<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBairrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bairros', function (Blueprint $table) {
            $table->foreign(['cidade_id'], 'fk_bairros_cidades1')->references(['id'])->on('cidades')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bairros', function (Blueprint $table) {
            $table->dropForeign('fk_bairros_cidades1');
        });
    }
}
