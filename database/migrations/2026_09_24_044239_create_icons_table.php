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
        Schema::create('icons', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug');
            $table->string('source', 20);

            $table->jsonb('icon_node');
            $table->jsonb('tags')->nullable();

            $table->text('search_text');

            $table->boolean('is_available')
                ->default(true);

            $table->timestamps();

            $table->unique([
                'source',
                'slug',
            ]);

            $table->index([
                'source',
                'is_available',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('icons');
    }
};
