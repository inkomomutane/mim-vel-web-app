<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
         * Drop legacy foreign keys only when they still exist.
         *
         * This is important because a previous failed migration may
         * already have removed some or all of them.
         */
        if (Schema::hasTable('imovels')) {
            $this->dropForeignIfExists(
                table: 'imovels',
                name: 'fk_imovels_bairros1',
            );

            $this->dropForeignIfExists(
                table: 'imovels',
                name: 'fk_imovels_condicaos1',
            );

            $this->dropForeignIfExists(
                table: 'imovels',
                name: 'fk_imovels_statuses1',
            );

            $this->dropForeignIfExists(
                table: 'imovels',
                name: 'fk_imovels_tipo_de_imovels1',
            );

            $this->dropForeignIfExists(
                table: 'imovels',
                name: 'fk_imovels_users1',
            );
        }

        /*
         * Rename the table only if it has not already been renamed.
         */
        if (
            Schema::hasTable('imovels')
            && !Schema::hasTable('properties')
        ) {
            Schema::rename(
                'imovels',
                'properties',
            );
        }

        /*
         * Rename legacy columns.
         *
         * Each rename is conditional so this migration can safely
         * resume after a partially completed MySQL migration.
         */
        $this->renameColumn(
            table: 'properties',
            from: 'titulo',
            to: 'title',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'descricao',
            to: 'description',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'banheiros',
            to: 'bathrooms',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'preco',
            to: 'price',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'ano',
            to: 'year',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'andares',
            to: 'floors',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'quartos',
            to: 'bedrooms',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'garagens',
            to: 'garages',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'piscinas',
            to: 'pools',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'endereco',
            to: 'address',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'mapa',
            to: 'map',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'bairro_id',
            to: 'neighborhood_id',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'condicao_id',
            to: 'property_condition_id',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'tipo_de_imovel_id',
            to: 'property_type_id',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'corretor_id',
            to: 'broker_id',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'regra_de_negocio_id',
            to: 'business_rule_id',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'imovel_for_id',
            to: 'property_for_id',
        );

        /*
         * Rename indexes if they have not already been renamed.
         */
        $this->renameIndex(
            table: 'properties',
            from: 'fk_imovels_bairros1_idx',
            to: 'properties_neighborhood_id_index',
        );

        $this->renameIndex(
            table: 'properties',
            from: 'fk_imovels_condicaos1_idx',
            to: 'properties_property_condition_id_index',
        );

        $this->renameIndex(
            table: 'properties',
            from: 'fk_imovels_tipo_de_imovels1_idx',
            to: 'properties_property_type_id_index',
        );

        $this->renameIndex(
            table: 'properties',
            from: 'fk_imovels_statuses1_idx',
            to: 'properties_status_id_index',
        );

        $this->renameIndex(
            table: 'properties',
            from: 'fk_imovels_users1_idx',
            to: 'properties_broker_id_index',
        );

        /*
         * Use whichever version of the referenced table currently exists.
         *
         * This is the key fix.
         *
         * For example, if the PropertyCondition rename migration has
         * not run yet, reference `condicaos`. When that table is later
         * renamed to `property_conditions`, MySQL will update the
         * relationship.
         */
        $neighborhoodTable = Schema::hasTable('neighborhoods')
            ? 'neighborhoods'
            : 'bairros';

        $propertyConditionTable = Schema::hasTable('property_conditions')
            ? 'property_conditions'
            : 'condicaos';

        $propertyTypeTable = Schema::hasTable('property_types')
            ? 'property_types'
            : 'tipo_de_imovels';

        /*
         * Recreate each FK only if the column does not already have one.
         *
         * Your previous failed execution may already have created the
         * neighborhood FK before failing on property_conditions.
         */
        $this->addForeignIfMissing(
            table: 'properties',
            column: 'neighborhood_id',
            referencedTable: $neighborhoodTable,
            name: 'properties_neighborhood_id_foreign',
        );

        $this->addForeignIfMissing(
            table: 'properties',
            column: 'property_condition_id',
            referencedTable: $propertyConditionTable,
            name: 'properties_property_condition_id_foreign',
        );

        $this->addForeignIfMissing(
            table: 'properties',
            column: 'property_type_id',
            referencedTable: $propertyTypeTable,
            name: 'properties_property_type_id_foreign',
        );

        $this->addForeignIfMissing(
            table: 'properties',
            column: 'status_id',
            referencedTable: 'statuses',
            name: 'properties_status_id_foreign',
        );

        $this->addForeignIfMissing(
            table: 'properties',
            column: 'broker_id',
            referencedTable: 'users',
            name: 'properties_broker_id_foreign',
        );
    }

    public function down(): void
    {
        if (!Schema::hasTable('properties')) {
            return;
        }

        $this->dropForeignByColumnIfExists(
            table: 'properties',
            column: 'neighborhood_id',
        );

        $this->dropForeignByColumnIfExists(
            table: 'properties',
            column: 'property_condition_id',
        );

        $this->dropForeignByColumnIfExists(
            table: 'properties',
            column: 'property_type_id',
        );

        $this->dropForeignByColumnIfExists(
            table: 'properties',
            column: 'status_id',
        );

        $this->dropForeignByColumnIfExists(
            table: 'properties',
            column: 'broker_id',
        );

        $this->renameIndex(
            table: 'properties',
            from: 'properties_neighborhood_id_index',
            to: 'fk_imovels_bairros1_idx',
        );

        $this->renameIndex(
            table: 'properties',
            from: 'properties_property_condition_id_index',
            to: 'fk_imovels_condicaos1_idx',
        );

        $this->renameIndex(
            table: 'properties',
            from: 'properties_property_type_id_index',
            to: 'fk_imovels_tipo_de_imovels1_idx',
        );

        $this->renameIndex(
            table: 'properties',
            from: 'properties_status_id_index',
            to: 'fk_imovels_statuses1_idx',
        );

        $this->renameIndex(
            table: 'properties',
            from: 'properties_broker_id_index',
            to: 'fk_imovels_users1_idx',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'title',
            to: 'titulo',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'description',
            to: 'descricao',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'bathrooms',
            to: 'banheiros',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'price',
            to: 'preco',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'year',
            to: 'ano',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'floors',
            to: 'andares',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'bedrooms',
            to: 'quartos',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'garages',
            to: 'garagens',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'pools',
            to: 'piscinas',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'address',
            to: 'endereco',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'map',
            to: 'mapa',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'neighborhood_id',
            to: 'bairro_id',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'property_condition_id',
            to: 'condicao_id',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'property_type_id',
            to: 'tipo_de_imovel_id',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'broker_id',
            to: 'corretor_id',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'business_rule_id',
            to: 'regra_de_negocio_id',
        );

        $this->renameColumn(
            table: 'properties',
            from: 'property_for_id',
            to: 'imovel_for_id',
        );

        if (
            Schema::hasTable('properties')
            && !Schema::hasTable('imovels')
        ) {
            Schema::rename(
                'properties',
                'imovels',
            );
        }

        $neighborhoodTable = Schema::hasTable('bairros')
            ? 'bairros'
            : 'neighborhoods';

        $propertyConditionTable = Schema::hasTable('condicaos')
            ? 'condicaos'
            : 'property_conditions';

        $propertyTypeTable = Schema::hasTable('tipo_de_imovels')
            ? 'tipo_de_imovels'
            : 'property_types';

        $this->addForeignIfMissing(
            table: 'imovels',
            column: 'bairro_id',
            referencedTable: $neighborhoodTable,
            name: 'fk_imovels_bairros1',
        );

        $this->addForeignIfMissing(
            table: 'imovels',
            column: 'condicao_id',
            referencedTable: $propertyConditionTable,
            name: 'fk_imovels_condicaos1',
        );

        $this->addForeignIfMissing(
            table: 'imovels',
            column: 'status_id',
            referencedTable: 'statuses',
            name: 'fk_imovels_statuses1',
        );

        $this->addForeignIfMissing(
            table: 'imovels',
            column: 'tipo_de_imovel_id',
            referencedTable: $propertyTypeTable,
            name: 'fk_imovels_tipo_de_imovels1',
        );

        $this->addForeignIfMissing(
            table: 'imovels',
            column: 'corretor_id',
            referencedTable: 'users',
            name: 'fk_imovels_users1',
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

    private function renameIndex(
        string $table,
        string $from,
        string $to,
    ): void {
        if (!Schema::hasTable($table)) {
            return;
        }

        $indexes = collect(
            Schema::getIndexes($table),
        )->pluck('name');

        if (
            !$indexes->contains($from)
            || $indexes->contains($to)
        ) {
            return;
        }

        Schema::table(
            $table,
            function (Blueprint $blueprint) use (
                $from,
                $to,
            ) {
                $blueprint->renameIndex(
                    $from,
                    $to,
                );
            },
        );
    }

    private function addForeignIfMissing(
        string $table,
        string $column,
        string $referencedTable,
        string $name,
    ): void {
        if (
            !Schema::hasTable($table)
            || !Schema::hasTable($referencedTable)
            || !Schema::hasColumn($table, $column)
        ) {
            return;
        }

        $foreignKeys = Schema::getForeignKeys(
            $table,
        );

        $exists = collect($foreignKeys)
            ->contains(
                fn (array $foreign) => in_array(
                    $column,
                    $foreign['columns'],
                    true,
                ),
            );

        if ($exists) {
            return;
        }

        Schema::table(
            $table,
            function (Blueprint $blueprint) use (
                $column,
                $referencedTable,
                $name,
            ) {
                $blueprint
                    ->foreign(
                        $column,
                        $name,
                    )
                    ->references('id')
                    ->on($referencedTable)
                    ->noActionOnUpdate()
                    ->noActionOnDelete();
            },
        );
    }

    private function dropForeignIfExists(
        string $table,
        string $name,
    ): void {
        if (!Schema::hasTable($table)) {
            return;
        }

        $foreignKeys = Schema::getForeignKeys(
            $table,
        );

        $exists = collect($foreignKeys)
            ->contains(
                fn (array $foreign) => (
                        $foreign['name'] ?? null
                    ) === $name,
            );

        if (!$exists) {
            return;
        }

        Schema::table(
            $table,
            function (Blueprint $blueprint) use ($name) {
                $blueprint->dropForeign(
                    $name,
                );
            },
        );
    }

    private function dropForeignByColumnIfExists(
        string $table,
        string $column,
    ): void {
        if (!Schema::hasTable($table)) {
            return;
        }

        $foreign = collect(
            Schema::getForeignKeys($table),
        )->first(
            fn (array $foreign) => in_array(
                $column,
                $foreign['columns'],
                true,
            ),
        );

        if (!$foreign) {
            return;
        }

        Schema::table(
            $table,
            function (Blueprint $blueprint) use ($foreign) {
                $blueprint->dropForeign(
                    $foreign['name'],
                );
            },
        );
    }
};
