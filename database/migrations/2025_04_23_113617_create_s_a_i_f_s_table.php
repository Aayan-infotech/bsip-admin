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
        Schema::create('saifs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('staff')->onDelete('cascade');
            $table->string('instrument_name');
            $table->string('instrument_name_hin');
            $table->longText('description_hin')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('pdf_file')->nullable();
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
        Schema::dropIfExists('saifs');
    }
};
