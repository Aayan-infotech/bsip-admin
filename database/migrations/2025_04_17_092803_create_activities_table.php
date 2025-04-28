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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_name_id');
            $table->foreign('activity_name_id')->references('id')->on('activities_names')->onDelete('cascade');
            $table->string('related_project');
            $table->string('hin_related_project')->nullable();
            $table->string('project_title')->nullable();
            $table->string('hin_project_title')->nullable();
            $table->string('project_coordinator')->nullable();
            $table->string('hin_project_coordinator')->nullable();
            $table->string('project_co_coordinator')->nullable();
            $table->string('hin_project_co_coordinator')->nullable();
            $table->string('project_core_members')->nullable();
            $table->string('hin_project_core_members')->nullable();
            $table->string('associated_members')->nullable();
            $table->string('hin_associated_members')->nullable();
            $table->string('description')->nullable();
            $table->string('hin_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
