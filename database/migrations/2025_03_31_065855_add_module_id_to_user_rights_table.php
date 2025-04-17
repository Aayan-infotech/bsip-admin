<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddModuleIdToUserRightsTable extends Migration
{
    public function up()
    {
        Schema::table('user_rights', function (Blueprint $table) {
            // $table->unsignedBigInteger('module_id')->nullable()->after('page_id'); // Add module_id column
            // $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade'); // Add foreign key constraint
        });
    }

    public function down()
    {
        Schema::table('user_rights', function (Blueprint $table) {
            $table->dropForeign(['module_id']); // Drop foreign key
            $table->dropColumn('module_id'); // Drop module_id column
        });
    }
}