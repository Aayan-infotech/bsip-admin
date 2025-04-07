<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddModuleIdToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('module_id')->nullable()->after('email'); // Add module_id column
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('set null'); // Add foreign key constraint
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['module_id']); // Drop foreign key
            $table->dropColumn('module_id'); // Drop module_id column
        });
    }
}