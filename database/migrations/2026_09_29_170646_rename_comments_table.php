<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::rename('comentarios', 'comments');

        Schema::table('comments', function (Blueprint $table) {
            $table->renameColumn('comentario', 'comment');
            $table->renameColumn('nome', 'name');
            $table->renameColumn('imovel_id', 'property_id');

            $table->renameIndex(
                'fk_comentarios_imovels1_idx',
                'fk_comments_properties1_idx',
            );
        });
    }

    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->renameColumn('comment', 'comentario');
            $table->renameColumn('name', 'nome');
            $table->renameColumn('property_id', 'imovel_id');

            $table->renameIndex(
                'fk_comments_properties1_idx',
                'fk_comentarios_imovels1_idx',
            );
        });

        Schema::rename('comments', 'comentarios');
    }
};
