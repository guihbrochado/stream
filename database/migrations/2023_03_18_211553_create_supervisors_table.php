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
        Schema::create('supervisors', function (Blueprint $table) {
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
        Schema::table('supervisors', function (Blueprint $table) {
            $table->dropForeign('supervisors_supervisor_group_id_foreign');
        });

        Schema::table('supervisors', function (Blueprint $table) {
            $table->dropForeign('supervisors_user_id_foreign');
        });

        Schema::table('supervisors', function (Blueprint $table) {
            $table->dropUnique(['supervisor_group_id', 'user_id']);
        });
        
        Schema::dropIfExists('supervisors');
    }
};
