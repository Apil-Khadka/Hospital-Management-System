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
        Schema::create("lab_order_details", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("lab_order_id")
                ->constrained()
                ->onDelete("cascade");
            $table
                ->foreignId("lab_test_id")
                ->constrained()
                ->onDelete("cascade");
            $table->text("result")->nullable();
            $table->timestamp("result_date")->nullable();
            $table->text("remarks")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("lab_order_details");
    }
};
