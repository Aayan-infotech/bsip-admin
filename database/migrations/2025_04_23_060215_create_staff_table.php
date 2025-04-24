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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->unique();
            $table->enum('staff_type',['Scientist','Other']);
            $table->foreignId('category_id')->constrained('staff__categories')->onDelete('cascade');
            $table->foreignId('sub_category_id')->constrained('staff_sub_categories')->onDelete('cascade');
            $table->string('name');
            $table->string('name_hin');
            $table->string('telephone_extension')->nullable();
            $table->string('personal_telephone')->nullable();
            $table->string('mobile_no', 20)->nullable();
            $table->string('alternate_mobile_no', 20)->nullable();
            $table->string('email')->unique();
            $table->string('alternate_email')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('cv')->nullable();
            $table->date('joining_date')->nullable();
            $table->date('exit_date')->nullable();
            $table->date('superannuation_date')->nullable();
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
        Schema::dropIfExists('staff');
    }
};
