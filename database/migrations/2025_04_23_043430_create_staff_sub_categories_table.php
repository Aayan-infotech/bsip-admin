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
        Schema::create('staff_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('staff__categories')->onDelete('cascade');
            $table->string('sub_category_name');
            $table->string('sub_category_name_hin');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_sub_categories');
    }
};
