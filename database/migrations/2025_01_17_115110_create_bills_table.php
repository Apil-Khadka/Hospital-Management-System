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
        Schema::create("bills", function (Blueprint $table) {
            $table->id();
            $table->foreignId("patient_id")->constrained()->onDelete("cascade");
            $table
                ->foreignId("appointment_id")
                ->nullable()
                ->constrained()
                ->onDelete("cascade");
            $table->decimal("total_amount", 10, 2);
            $table->decimal("paid_amount", 10, 2)->default(0);
            $table->enum("status", ["pending", "partial", "paid", "cancelled"]);
            $table
                ->enum("payment_method", ["cash", "card", "insurance", "other"])
                ->nullable();
            $table->string("insurance_provider")->nullable();
            $table->string("insurance_policy_number")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("bills");
    }
};
