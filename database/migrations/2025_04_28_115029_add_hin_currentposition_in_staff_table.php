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
        Schema::table('staff', function (Blueprint $table) {
            $table->string('hin_current_position')->nullable()->after('current_position');
            $table->string('hin_previous_position')->nullable()->after('previous_position');
            $table->string('hin_educational_qualification')->nullable()->after('educational_qualification');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->dropColumn('hin_current_position');
            $table->dropColumn('hin_previous_position');
            $table->dropColumn('hin_educational_qualification');
        });
    }
};
