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
        Schema::create('supervisor_group_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supervisor_group_id')
                ->index()
                ->nullable(false)
                ->cascadeOnUpdate()
                ->cascadeOnDelete()
                ->constrained();
            $table->foreignId('user_id')
                ->index()
                ->nullable(false)
                ->cascadeOnUpdate()
                ->cascadeOnDelete()
                ->constrained();
            $table->timestamps();
            $table->unique(['supervisor_group_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('supervisor_group_members', function (Blueprint $table) {
            $table->dropForeign('supervisor_group_members_supervisor_group_id_foreign');
        });

        Schema::table('supervisor_group_members', function (Blueprint $table) {
            $table->dropForeign('supervisor_group_members_user_id_foreign');
        });

        Schema::table('supervisor_group_members', function (Blueprint $table) {
            $table->dropUnique(['supervisor_group_id', 'user_id']);
        });
        
        Schema::dropIfExists('supervisor_group_members');
    }
};
