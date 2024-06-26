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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('balance')->default(0);
            $table->integer('current_withdraw_limit')->default(5000);
            $table->integer('daily_withdraw_limit')->default('5000');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('balance');
            $table->dropColumn('current_withdraw_limit');
            $table->dropColumn('daily_withdraw_limit');
        });
    }
};
