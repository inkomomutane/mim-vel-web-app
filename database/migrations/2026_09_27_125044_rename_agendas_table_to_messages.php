<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::rename('agendas', 'messages');
        Schema::table('messages', function (Blueprint $table) {
            $table->renameColumn('nome_do_cliente', 'client_name');
            $table->renameColumn('local', 'location');
            $table->renameColumn('contacto', 'contact');
            $table->renameColumn('data_hora', 'date_time');
            $table->renameColumn('corretor_id', 'broker_id');
            // rename the index as well
            $table->renameIndex('fk_agendas_users1_idx', 'fk_messages_users1_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('messages', 'agendas');
        Schema::table('agendas', function (Blueprint $table) {
            $table->renameColumn('client_name', 'nome_do_cliente');
            $table->renameColumn('location', 'local');
            $table->renameColumn('contact', 'contacto');
            $table->renameColumn('date_time', 'data_hora');
            $table->renameColumn('broker_id', 'corretor_id');

            $table->renameIndex('fk_messages_users1_idx', 'fk_agendas_users1_idx');
        });
    }
};
