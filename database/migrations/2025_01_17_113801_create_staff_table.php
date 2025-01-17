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
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table
                ->foreignId("department_id")
                ->constrained()
                ->onDelete("cascade");
            $table->string("specialization")->nullable();
            $table->string("qualification")->nullable();
            $table->integer("experience_years")->nullable();
            $table->string("license_number")->nullable();

            $table->timestamps();
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
