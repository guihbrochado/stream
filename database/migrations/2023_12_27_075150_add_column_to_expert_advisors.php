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
        Schema::table('expert_advisors', function (Blueprint $table) {
            $table->string('allowed_symbols', 1000)->nullable(true)->after('port');
            $table->foreignId('operation_type_id')
                ->index()
                ->nullable(true)
                ->cascadeOnUpdate()
                ->restrictOnDelete()
                ->constrained()
                ->after('allowed_symbols');
            $table->decimal('default_volume', 65, 12)->nullable(true)->after('operation_type_id');
            $table->decimal('default_leverage',65,12)->nullable(true)->after('default_volume');
            $table->decimal('default_max_volume',65,12)->nullable(true)->after('default_leverage');
            $table->decimal('default_max_daily_loss', 65,12)->nullable(true)->after('default_max_volume');
            $table->boolean('copy_orders')->nullable(false)->default(0)->after('default_max_daily_loss');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expert_advisors', function (Blueprint $table) {
            $table->dropForeign('expert_advisors_operation_type_id_foreign');
        });

        Schema::table('expert_advisors', function (Blueprint $table) {
            $table->dropColumn('allowed_symbols');
            $table->dropColumn('operation_type_id');
            $table->dropColumn('default_volume');
            $table->dropColumn('default_leverage');
            $table->dropColumn('default_max_volume');
            $table->dropColumn('default_max_daily_loss');
            $table->dropColumn('copy_orders');
        });
    }
};
