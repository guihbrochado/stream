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
        Schema::table('copy_sender_positions', function (Blueprint $table) { 
            $table->dropUnique('copy_sender_positions_ecpp_unique');
            $table->unique(['expert_code', 'account', 'position_symbol', 'position_id', 'magic_number'], 'copy_sender_positions_ecpp_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('copy_sender_positions', function (Blueprint $table) {
            $table->dropUnique('copy_sender_positions_ecpp_unique');
            $table->unique(['expert_code', 'account', 'position_symbol', 'position_id'], 'copy_sender_positions_ecpp_unique');
        });
    }
};