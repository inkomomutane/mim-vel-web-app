<?php

use App\Models\User;
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
        Schema::table('imovels', function (Blueprint $table) {
            $table->boolean('approved')->default(false);
            $table->foreignIdFor(User::class, 'approved_by_id')->nullable()->default(null);
            $table->dateTime('approved_at')->nullable()->default(null);;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('imovels', function (Blueprint $table) {
            $table->dropColumn('approved');
            $table->dropColumn('approved_by_id');
            $table->dropColumn('approved_at');
        });
    }
};
