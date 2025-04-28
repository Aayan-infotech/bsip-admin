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
        Schema::create('annual__reports', function (Blueprint $table) {
            $table->id();
            $table->string('report_name');
            $table->string('report_hin_name');
            $table->string('report_file')->nullable();
            $table->string('report_file_hin')->nullable();
            $table->string('more_info')->nullable();
            $table->string('more_info_hin')->nullable();
            $table->boolean('status')->default(true);
            $table->enum('archived_status', ['Yes', 'No'])->default('No');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annual__reports');
    }
};
