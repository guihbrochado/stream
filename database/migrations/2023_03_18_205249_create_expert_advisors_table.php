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
        Schema::create('expert_advisors', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->nullable(false);
            $table->text('description')->nullable();
            $table->bigInteger('magic_number')->nullable(false);
            $table->string('name', 100)->nullable(false);
            $table->boolean('active')->nullable(false)->default(0);
            $table->boolean('visible')->nullable(false)->default(0);
            $table->unique(['code', 'magic_number']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expert_advisors');
    }
};
