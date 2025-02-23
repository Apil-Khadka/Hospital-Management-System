<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("staff", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("user_id")
                ->unique()
                ->constrained()
                ->onDelete("cascade");
            $table
                ->foreignId("department_id")
                ->constrained()
                ->onDelete("cascade");
            $table->string("specialization")->nullable(); // Specialization of the staff member
            $table->string("qualification")->nullable(); // Qualification of the staff member
            $table->integer("experience_years")->nullable(); // Years of experience
            $table->bigInteger("salary")->nullable(); // Salary of the staff member
            $table->string("license_number")->nullable(); // License number if applicable
            $table->date("date_of_birth")->nullable(); // Date of birth
            $table->enum("gender", ["male", "female", "other"])->nullable(); // Gender
            $table->string("phone_number")->nullable(); // Phone number
            $table->string("temporary_address")->nullable(); // Temporary address
            $table->string("permanent_address")->nullable(); // Permanent address
            $table
                ->enum("employment_status", [
                    "full-time",
                    "part-time",
                    "contract",
                ])
                ->default("full-time"); // Employment status
            $table->string("shift_details")->nullable(); // Shift details
            $table->string("emergency_contact_name")->nullable(); // Emergency contact name
            $table->string("emergency_contact_relationship")->nullable(); // Emergency contact relationship
            $table->string("emergency_contact_phone")->nullable(); // Emergency contact phone number
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("staff");
    }
};
