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
        Schema::create('supervisor_group_experts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supervisor_group_id')
                ->nullable(false);
            $table->foreignId('expert_advisor_id')
                ->index()
                ->nullable(false)
                ->cascadeOnUpdate()
                ->cascadeOnDelete()
                ->constrained();
            $table->timestamps();
            $table->unique(['supervisor_group_id', 'expert_advisor_id'], 'sge_supervisor_group_id_expert_advisor_id_unique');
            $table->foreign('supervisor_group_id', 'supervisor_experts_group_id_foreign')
                ->references('id')
                ->on('supervisor_groups')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('supervisor_group_experts', function (Blueprint $table) {
            $table->dropForeign('supervisor_experts_group_id_foreign');
        });

        Schema::table('supervisor_group_experts', function (Blueprint $table) {
            $table->dropForeign('supervisor_group_experts_expert_advisor_id_foreign');
        });
        
        Schema::table('supervisor_group_experts', function (Blueprint $table) {
            $table->dropFullText('sge_supervisor_group_id_expert_advisor_id_unique');
        });

        Schema::dropIfExists('supervisor_group_experts');
    }
};
