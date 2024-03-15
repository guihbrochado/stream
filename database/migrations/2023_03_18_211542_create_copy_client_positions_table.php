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
        Schema::create('copy_client_positions', function (Blueprint $table) {
            $table->id();
            $table->string('symbol', 10)->nullable(false);
            $table->bigInteger('account')->nullable(false);
            $table->string('expert_code', 20)->nullable(false);
            $table->decimal('account_balance', 65, 12)->nullable(false);
            $table->decimal('account_equity', 65, 12)->nullable(false);
            $table->integer('account_trade_mode')->nullable(false);
            $table->integer('account_trade_allowed')->nullable(false);
            $table->integer('terminal_trade_allowed')->nullable(false);
            $table->integer('mql_trade_allowed')->nullable(false);
            $table->integer('account_trade_expert')->nullable(false);
            $table->decimal('account_credit', 65, 12)->nullable(false);
            $table->decimal('account_profit', 65, 12)->nullable(false);
            $table->integer('account_margin_mode')->nullable(false);
            $table->decimal('account_margin', 65, 12)->nullable(false);
            $table->decimal('account_margin_free', 65, 12)->nullable(false);
            $table->decimal('account_margin_level', 65, 12)->nullable(false);
            $table->string('account_name', 100)->nullable();
            $table->string('account_server', 100)->nullable();
            $table->string('account_currency', 5)->nullable();
            $table->string('account_company', 100)->nullable();
            $table->string('remote_adress', 100)->nullable();
            $table->bigInteger('position_ticket')->nullable();
            $table->dateTime('position_time')->nullable();
            $table->integer('position_type')->nullable();
            $table->bigInteger('position_magic')->nullable();
            $table->integer('position_reason')->nullable();
            $table->bigInteger('position_id')->nullable();
            $table->decimal('position_volume', 65, 12)->nullable();
            $table->decimal('position_price_open', 65, 12)->nullable();
            $table->decimal('position_swap', 65, 12)->nullable();
            $table->decimal('position_profit', 65, 12)->nullable();
            $table->decimal('position_sl', 65, 12)->nullable();
            $table->decimal('position_tp', 65, 12)->nullable();
            $table->string('position_symbol', 10)->nullable();
            $table->string('position_comment', 200)->nullable();
            $table->timestamps();
            $table->unique(['account', 'position_magic', 'position_ticket'], 'copy_client_positions_cpt_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('copy_client_positions', function ($table) {
            $table->dropUnique('copy_client_positions_cpt_unique');
        });

        Schema::dropIfExists('copy_client_positions');
    }
};
