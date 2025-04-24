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
            $table->string('current_position')->nullable()->after('name_hin');
            $table->string('previous_position')->nullable()->after('current_position');
            $table->string('educational_qualification')->nullable()->after('previous_position');
            $table->string('no_of_publications')->nullable()->after('educational_qualification');
            $table->string('total_citations')->nullable()->after('no_of_publications');
            $table->longText('research_interests')->nullable()->after('total_citations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->dropColumn('current_position');
            $table->dropColumn('previous_position');
            $table->dropColumn('educational_qualification');
            $table->dropColumn('no_of_publications');
            $table->dropColumn('total_citations');
            $table->dropColumn('research_interests');
        });
    }
};
