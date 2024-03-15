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
        Schema::create('store_traders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_company_id')
                ->nullable(false)
                ->cascadeOnUpdate()
                ->restrictOnDelete()
                ->constrained();
            $table->string('trader')->nullable(false);
            $table->string('trader_image_path', 2048)->nullable();
            $table->string('aux_image_path', 2048)->nullable();
            $table->boolean('active')->nullable(false)->default(0);
            $table->timestamps();
            $table->unique(['store_company_id', 'trader']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_traders');
    }
};
