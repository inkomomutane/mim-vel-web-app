<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::rename(
            'regra_de_negocios',
            'business_rules',
        );
    }

    public function down(): void
    {
        Schema::rename(
            'business_rules',
            'regra_de_negocios',
        );
    }
};
