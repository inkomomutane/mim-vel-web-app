<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $this->renameColumn(
            table: 'ratings',
            from: 'nome',
            to: 'name',
        );

        $this->renameColumn(
            table: 'ratings',
            from: 'imovel_id',
            to: 'property_id',
        );
    }

    public function down(): void
    {
        $this->renameColumn(
            table: 'ratings',
            from: 'name',
            to: 'nome',
        );

        $this->renameColumn(
            table: 'ratings',
            from: 'property_id',
            to: 'imovel_id',
        );
    }

    private function renameColumn(
        string $table,
        string $from,
        string $to,
    ): void {
        if (
            !Schema::hasTable($table)
            || !Schema::hasColumn($table, $from)
            || Schema::hasColumn($table, $to)
        ) {
            return;
        }

        Schema::table(
            $table,
            function (Blueprint $blueprint) use (
                $from,
                $to,
            ) {
                $blueprint->renameColumn(
                    $from,
                    $to,
                );
            },
        );
    }
};
