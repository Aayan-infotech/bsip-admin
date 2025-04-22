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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_hin');
            $table->text('description')->nullable();
            $table->text('description_hin')->nullable();
            $table->date('published_at')->nullable();
            $table->text('image')->nullable();
            $table->string('file')->nullable();
            $table->boolean('status')->default(1);
            $table->enum('archived_status',['Yes','No'])->default('No');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
