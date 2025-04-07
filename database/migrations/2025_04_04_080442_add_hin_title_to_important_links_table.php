<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHinTitleToImportantLinksTable extends Migration
{
    public function up()
    {
        Schema::table('important_links', function (Blueprint $table) {
            $table->string('hin_title')->nullable()->after('title'); // Add the hin_title column
        });
    }

    public function down()
    {
        Schema::table('important_links', function (Blueprint $table) {
            $table->dropColumn('hin_title'); // Remove the hin_title column if rolled back
        });
    }
}