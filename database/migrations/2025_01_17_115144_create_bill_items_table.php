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
        Schema::create("bill_items", function (Blueprint $table) {
            $table->id();
            $table->foreignId("bill_id")->constrained()->onDelete("cascade");
            $table->morphs("billable");
            $table->integer("quantity")->default(1);
            $table
                ->enum("status", ["pending", "paid", "cancelled"])
                ->default("pending");
            $table->decimal("total_price", 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("bill_items");
    }
};
