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
        Schema::create('institute__catalogues', function (Blueprint $table) {
            $table->id();
            $table->string('catalogue_name');
            $table->string('catalogue_hin_name');
            $table->string('writer_name')->nullable();
            $table->string('writer_hin_name')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('cover_image_hin')->nullable();
            $table->string('catalogue_file')->nullable();
            $table->string('catalogue_file_hin')->nullable();
            $table->string('more_info')->nullable();
            $table->string('more_info_hin')->nullable();
            $table->boolean('status')->default(1);
            $table->enum('archived_status', ['Yes', 'No'])->default('No');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institute__catalogues');
    }
};
