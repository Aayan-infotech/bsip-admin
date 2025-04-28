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
        Schema::create('past_heads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('hin_name');
            $table->string('from_month');
            $table->string('from_year');
            $table->string('to_month');
            $table->string('to_year');
            $table->string('image')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('past_heads');
    }
};
