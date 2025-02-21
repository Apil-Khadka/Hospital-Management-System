<?php

namespace Database\Seeders;

use App\Models\LabTest;
use Illuminate\Database\Seeder;

class LabTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $labTests = [
            [
                "name" => "Complete Blood Count (CBC)",
                "description" =>
                    "Measures various components of blood, including red blood cells, white blood cells, hemoglobin, and hematocrit.",
                "unit_price" => 500.0,
            ],
            [
                "name" => "Basic Metabolic Panel (BMP)",
                "description" =>
                    "Assesses blood glucose levels, calcium, and electrolytes such as sodium, potassium, and chloride.",
                "unit_price" => 700.0,
            ],
            [
                "name" => "Lipid Panel",
                "description" =>
                    "Evaluates cholesterol levels, including LDL, HDL, and triglycerides, to assess cardiovascular health.",
                "unit_price" => 600.0,
            ],
            [
                "name" => "Liver Function Test (LFT)",
                "description" =>
                    "Determines the health of the liver by measuring enzymes, proteins, and bilirubin levels.",
                "unit_price" => 650.0,
            ],
            [
                "name" => "Thyroid Stimulating Hormone (TSH) Test",
                "description" =>
                    "Measures the level of thyroid-stimulating hormone to evaluate thyroid function.",
                "unit_price" => 550.0,
            ],
        ];
        foreach ($labTests as $labTest) {
            LabTest::create($labTest);
        }
    }
}
