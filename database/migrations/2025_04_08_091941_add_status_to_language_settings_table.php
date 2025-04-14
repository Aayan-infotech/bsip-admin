<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToLanguageSettingsTable extends Migration
{
    public function up()
    {
        Schema::table('language_settings', function (Blueprint $table) {
            $table->boolean('status')->default(1)->after('language'); // Add status column
        });
    }

    public function down()
    {
        Schema::table('language_settings', function (Blueprint $table) {
            $table->dropColumn('status'); // Remove status column
        });
    }
}