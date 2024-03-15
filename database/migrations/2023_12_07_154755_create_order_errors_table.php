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
        Schema::create('order_errors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('account')->nullable(false);
            $table->string('ea_code', 50)->nullable(false);
            $table->integer('ea_port')->nullable();
            $table->bigInteger('magic_number')->nullable(false);            
            $table->integer('runtime_error_code')->nullable();            
            $table->integer('trade_server_return_code')->nullable();      
            $table->string('symbol', 20)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_errors');
    }
};
