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
        Schema::table('past_directors', function (Blueprint $table) {
            $table->string('hin_to_month')->after('to_month')->nullable();
            $table->string('hin_from_month')->after('from_month')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('past_directors', function (Blueprint $table) {
            $table->dropColumn('hin_to_month');
            $table->dropColumn('hin_from_month');
        });
    }
};
