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
            $table
                ->foreignId("appointment_id")
                ->unique()
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->decimal("total_amount", 10, 0)->default(0);
            $table->decimal("paid_amount", 10, 0)->default(0);
            $table
                ->enum("status", ["pending", "partial", "paid", "cancelled"])
                ->default("pending");
            $table
                ->enum("payment_method", [
                    "cash",
                    "card",
                    "insurance",
                    "online",
                ])
                ->nullable();
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
