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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->tinyInteger('status')->default(0)->comment('0: Pending, 1: Active, 2:Inactie'); // 0 = pending, 1 = active, 2 = inactive
            $table->unsignedBigInteger('department_id')->nullable(); // Foreign key to departments
            $table->unsignedBigInteger('jobrole_id')->nullable(); // Foreign key to job_roles
            $table->string('employee_code')->unique()->nullable();
            $table->date('joining_date')->nullable();
            $table->enum('employment_type', ['full-time', 'part-time', 'contract'])->default('full-time')->nullable();
            $table->decimal('salary', 10, 2)->nullable();
            $table->string('profile_picture')->nullable();
            $table->text('address')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable(); // Enum for gender
            $table->date('dob')->nullable(); // Date of Birth
            $table->enum('blood_group', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])->nullable(); // Enum for blood group
            $table->unsignedBigInteger('reviewinghr')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('jobrole_id')->references('id')->on('jobroles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
