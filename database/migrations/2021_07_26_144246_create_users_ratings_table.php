<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_ratings', function (Blueprint $table) {
            $table->unsignedBigInteger('users_id')->index('fk_users_has_imovels_users1_idx');
            $table->unsignedBigInteger('imovels_id')->index('fk_users_has_imovels_imovels1_idx');
            $table->float('rating', 10, 0)->nullable();
            $table->timestamps();
            $table->bigIncrements('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_ratings');
    }
}
