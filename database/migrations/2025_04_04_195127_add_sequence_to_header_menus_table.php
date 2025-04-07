<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSequenceToHeaderMenusTable extends Migration
{
    public function up()
    {
        Schema::table('header_menus', function (Blueprint $table) {
            $table->integer('sequence')->nullable()->after('url'); // Add the sequence column
        });
    }

    public function down()
    {
        Schema::table('header_menus', function (Blueprint $table) {
            $table->dropColumn('sequence'); // Remove the sequence column if rolled back
        });
    }
}