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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('ea_code', 50)->nullable(false);
            $table->bigInteger('account')->nullable(false);
            $table->bigInteger('deal_ticket')->nullable(false)->unique();
            $table->bigInteger('deal_order')->nullable(false);
            $table->dateTime('deal_time')->nullable(false);
            $table->bigInteger('deal_time_msc')->nullable(false);
            $table->string('deal_type', 50);
            $table->string('deal_entry', 50);
            $table->bigInteger('deal_magic');
            $table->string('deal_reason', 50);
            $table->bigInteger('deal_position_id');
            $table->decimal('deal_volume', 65, 12)->nullable(false);
            $table->decimal('deal_price', 65, 12)->nullable(false);
            $table->decimal('deal_commission', 65, 12)->nullable();
            $table->decimal('deal_swap', 65, 12)->nullable();
            $table->decimal('deal_profit', 65, 12)->nullable();
            $table->decimal('deal_fee', 65, 12)->nullable();
            $table->decimal('deal_sl', 65, 12)->nullable();
            $table->decimal('deal_tp', 65, 12)->nullable();
            $table->string('deal_symbol', 10)->nullable(false);
            $table->string('deal_comment', 200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
