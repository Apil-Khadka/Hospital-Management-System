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
        Schema::create("lab_orders", function (Blueprint $table) {
            $table->id();
            $table->foreignId("patient_id")->constrained()->onDelete("cascade");
            $table
                ->foreignId("staff_id")
                ->constrained("staff")
                ->onDelete("cascade");
            $table
                ->foreignId("appointment_id")
                ->nullable()
                ->constrained()
                ->onDelete("cascade");
            $table->enum("status", [
                "ordered",
                "sample_collected",
                "processing",
                "completed",
                "cancelled",
            ]);
            $table->text("notes")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("lab_orders");
    }
};
