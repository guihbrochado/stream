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
        Schema::table('expert_advisors', function (Blueprint $table) {
            $table->boolean('trades_paused')->nullable(false)->default(0);
            $table->boolean('close_positions')->nullable(false)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expert_advisors', function (Blueprint $table) {
            $table->dropColumn('trades_paused');
            $table->dropColumn('close_positions');
        });
    }
};
