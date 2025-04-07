<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentMenuIdToMenuPagesTable extends Migration
{
    public function up()
    {
        Schema::table('menu_pages', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_menu_id')->nullable()->after('sequence'); // Add parent_menu_id column
            $table->foreign('parent_menu_id')->references('id')->on('header_menus')->onDelete('cascade'); // Add foreign key constraint
        });
    }

    public function down()
    {
        Schema::table('menu_pages', function (Blueprint $table) {
            $table->dropForeign(['parent_menu_id']); // Drop foreign key
            $table->dropColumn('parent_menu_id'); // Drop parent_menu_id column
        });
    }
}