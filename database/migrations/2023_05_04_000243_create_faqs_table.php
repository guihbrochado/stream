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
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faq_categories_id')
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
        Schema::dropIfExists('faqs');
    }
};
