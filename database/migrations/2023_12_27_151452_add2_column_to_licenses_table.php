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
        Schema::table('licenses', function (Blueprint $table) { 
            $table->foreignId('operation_type_id')
                ->index()
                ->nullable(true)
                ->cascadeOnUpdate()
                ->restrictOnDelete()
                ->constrained()
                ->after('paused');
            $table->decimal('leverage',65,12)->nullable(true)->after('operation_type_id');
            $table->decimal('max_volume',65,12)->nullable(true)->after('leverage');
            $table->decimal('max_daily_loss', 65,12)->nullable(true)->after('max_volume');
            $table->string('allowed_symbols', 1000)->nullable(false)->after('max_daily_loss');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('licenses', function (Blueprint $table) {
            $table->dropForeign('licenses_operation_type_id_foreign');
        });

        Schema::table('licenses', function (Blueprint $table) {
            $table->dropColumn('operation_type_id');
            $table->dropColumn('leverage');
            $table->dropColumn('max_volume');
            $table->dropColumn('max_daily_loss');
            $table->dropColumn('allowed_symbols');
        });
    }
};
