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
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expert_advisor_id')
                ->index()
                ->nullable(false)
                ->cascadeOnUpdate()
                ->restrictOnDelete()
                ->constrained();
            $table->foreignId('account_id')
                ->index()
                ->nullable(false)
                ->cascadeOnUpdate()
                ->restrictOnDelete()
                ->constrained();
            $table->boolean('lifetime')->nullable(false)->default(0);
            $table->date('validity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('licenses', function (Blueprint $table) {
            $table->dropForeign('licenses_expert_advisor_id_foreign');
        });

        Schema::table('licenses', function (Blueprint $table) {
            $table->dropForeign('licenses_account_id_foreign');
        });

        Schema::dropIfExists('licenses');
    }
};
