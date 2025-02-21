<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\LabOrder;
use Illuminate\Database\Seeder;

class LabOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appointments = Appointment::pluck("id")->toArray();

        foreach ($appointments as $appointmentId) {
            LabOrder::create([
                "appointment_id" => $appointmentId,
                "status" => fake()->randomElement([
                    "ordered",
                    "sample_collected",
                    "processing",
                    "completed",
                    "cancelled",
                ]),
                "notes" => fake()->sentence,
            ]);
        }
    }
}
