<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assuming you have existing patients and departments
        $patientIds = Patient::pluck("id")->toArray();

        // Insert five appointments
        foreach (range(1, 5) as $index) {
            Appointment::create([
                "patient_id" => fake()->randomElement($patientIds),
                "staff_id" => 2, // Assigning staff_id 2 as the doctor
                "appointment_date" => fake()
                    ->dateTimeBetween("now", "+1 year")
                    ->format("Y-m-d"),
                "appointment_time" => fake()->time("H:i:s"),
                "status" => fake()->randomElement([
                    "Scheduled",
                    "Completed",
                    "Cancelled",
                ]),
                "type" => fake()->randomElement([
                    "routine",
                    "follow_up",
                    "emergency",
                    "consultation",
                ]),
                "notes" => fake()->sentence,
            ]);
        }
    }
}
