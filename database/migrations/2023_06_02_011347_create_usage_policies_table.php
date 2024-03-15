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
        Schema::create('usage_policies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usage_policy_category_id')
                ->index()
                ->nullable(false)
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('icon', 100)->nullable();
            $table->string('question', 500)->nullable(false)->unique();
            $table->text('answer')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usage_policies');
    }
};
