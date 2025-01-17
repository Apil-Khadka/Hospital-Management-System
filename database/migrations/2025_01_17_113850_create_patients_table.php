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
        Schema::create("patients", function (Blueprint $table) {
            $table->id();
            $table
                ->string("mrn", 20)
                ->unique()
                ->comment("Medical Record Number");
            $table->string("first_name");
            $table->string("last_name");
            $table->date("date_of_birth");
            $table->enum("gender", ["male", "female", "other"]);
            $table
                ->enum("blood_group", [
                    "A+",
                    "A-",
                    "B+",
                    "B-",
                    "AB+",
                    "AB-",
                    "O+",
                    "O-",
                ])
                ->nullable();
            $table->text("address")->nullable();
            $table->string("phone", 20)->nullable();
            $table->string("email")->nullable();
            $table->string("emergency_contact_name")->nullable();
            $table->string("emergency_contact_phone", 20)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("patients");
    }
};
