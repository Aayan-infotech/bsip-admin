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
        Schema::create('sponsored_projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_title')->nullable();
            $table->string('hin_project_title')->nullable();
            $table->string('project_coordinator')->nullable();
            $table->string('hin_project_coordinator')->nullable();
            $table->string('funding_agency')->nullable();
            $table->string('hin_funding_agency')->nullable();
            $table->string('project_no')->nullable();
            $table->string('project_cost')->nullable();
            $table->date('start_date')->nullable();
            $table->string('duration')->nullable();
            $table->string('hin_duration')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsored_projects');
    }
};
