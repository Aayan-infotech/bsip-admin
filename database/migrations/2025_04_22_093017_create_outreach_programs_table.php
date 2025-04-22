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
        Schema::create('outreach_programs', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('title_hin')->nullable();
            $table->date('date')->nullable();
            $table->string('pdf_file')->nullable();
            $table->longText('images')->nullable();
            $table->longText('description')->nullable();
            $table->longText('description_hin')->nullable();
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
        Schema::dropIfExists('outreach_programs');
    }
};
