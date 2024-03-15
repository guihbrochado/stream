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
            $table->decimal('volume', 65, 12)->nullable(true)->after('validity');
            $table->boolean('paused')->nullable(false)->default(0)->after('volume');            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('licenses', function (Blueprint $table) {
            $table->dropColumn('volume');
            $table->dropColumn('paused');
        });
    }
};
