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
        Schema::create('copy_sender_positions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('account')->nullable(false);
            $table->string('expert_code', 20)->nullable(false);
            $table->bigInteger('magic_number')->nullable(false);
            $table->bigInteger('position_ticket')->nullable();
            $table->dateTime('position_time')->nullable();
            $table->integer('position_type')->nullable();
            $table->decimal('position_volume', 65, 12)->nullable();
            $table->decimal('position_price_open', 65, 12)->nullable();
            $table->decimal('position_profit', 65, 12)->nullable();
            $table->string('position_symbol', 10)->nullable(false);
            $table->bigInteger('position_id')->nullable();
            $table->timestamps();
            $table->unique(['expert_code', 'account', 'position_symbol', 'position_id'], 'copy_sender_positions_ecpp_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('copy_sender_positions', function ($table) {
            $table->dropUnique('copy_sender_positions_ecpp_unique');
        });

        Schema::dropIfExists('copy_sender_positions');
    }
};
