<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Prescription;
use Illuminate\Database\Seeder;

class PrescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appointments = Appointment::pluck("id")->toArray();

        foreach ($appointments as $appointment) {
            Prescription::create([
                "appointment_id" => $appointment,
                "diagnosis" => fake()->sentence(),
                "notes" => fake()->sentence(),
            ]);
        }
    }
}
