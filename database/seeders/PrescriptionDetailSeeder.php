<?php

namespace Database\Seeders;

use App\Models\Medication;
use App\Models\Prescription;
use App\Models\PrescriptionDetail;
use Illuminate\Database\Seeder;

class PrescriptionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prescriptions = Prescription::pluck("id")->toArray();
        $medications = Medication::pluck("id")->toArray();

        foreach ($prescriptions as $prescriptionId) {
            foreach ($medications as $medicineId) {
                PrescriptionDetail::create([
                    "prescription_id" => $prescriptionId,
                    "medication_id" => $medicineId,
                    "dosage" => rand(1, 10),
                    "frequency" => rand(1, 3),
                    "duration" => rand(1, 30),
                    "instructions" => fake()->sentence(),
                ]);
            }
        }
    }
}
