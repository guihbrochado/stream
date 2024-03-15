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
        Schema::table('accounts', function (Blueprint $table) {
            //
            $table->string('symbols', 255)->nullable(true)->after('password');
            $table->integer('volume')->nullable(true)->after('symbols');
            $table->string('image', 255)->nullable(true)->after('volume');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            //
            $table->dropColumn('symbols');
            $table->dropColumn('volume');
            $table->dropColumn('image');
        });
    }
};
