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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->boolean('starred')->nullable(false)->default(0);
            $table->foreignId('ticket_category_id')
                ->index()
                ->nullable(false)
                ->constrained()
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreignId('ticket_status_id')
                ->index()
                ->nullable(false)
                ->constrained()
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreignId('user_id')
                ->index()
                ->nullable(false)
                ->constrained()
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->string('title', 100)->nullable();
            $table->text('description')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
