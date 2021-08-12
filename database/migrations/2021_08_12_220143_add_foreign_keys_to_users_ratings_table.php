<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsersRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_ratings', function (Blueprint $table) {
            $table->foreign('imovels_id', 'fk_users_has_imovels_imovels1')->references('id')->on('imovels')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('users_id', 'fk_users_has_imovels_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_ratings', function (Blueprint $table) {
            $table->dropForeign('fk_users_has_imovels_imovels1');
            $table->dropForeign('fk_users_has_imovels_users1');
        });
    }
}
