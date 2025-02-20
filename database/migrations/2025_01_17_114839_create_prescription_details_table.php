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
        Schema::create("prescription_details", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("prescription_id")
                ->constrained()
                ->onDelete("cascade");
            //To specify the patient
            $table
                ->foreignId("medication_id")
                ->constrained()
                ->onDelete("cascade");
            $table->string("dosage", 100);
            $table->string("frequency", 100);
            $table->string("duration", 100);
            $table->text("instructions")->nullable();
            $table->unique(["prescription_id", "medication_id"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("prescription_details");
    }
};
