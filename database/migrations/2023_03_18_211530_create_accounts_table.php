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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->index()
                ->nullable(false)
                ->cascadeOnUpdate()
                ->restrictOnDelete()
                ->constrained();
            $table->foreignId('account_type_id')
                ->index()
                ->nullable(false)
                ->cascadeOnUpdate()
                ->restrictOnDelete()
                ->constrained();
            $table->foreignId('broker_id')
                ->index()
                ->nullable()
                ->cascadeOnUpdate()
                ->restrictOnDelete()
                ->constrained();
            $table->string('server', 100)->nullable();
            $table->bigInteger('account')->nullable(false)->unique();
            $table->string('password', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropForeign('accounts_user_id_foreign');
        });

        Schema::table('accounts', function (Blueprint $table) {
            $table->dropForeign('accounts_account_type_id_foreign');
        });

        Schema::table('accounts', function (Blueprint $table) {
            $table->dropForeign('accounts_broker_id_foreign');
        });

        Schema::dropIfExists('accounts');
    }
};
