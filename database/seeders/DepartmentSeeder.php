<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                "name" => "Emergency",
                "description" =>
                    "Handles urgent and life-threatening conditions.",
                "contact_number" => "123-456-7890",
                "email" => "emergency@hospital.com",
                "location" => "Ground Floor",
            ],
            [
                "name" => "Consultancy",
                "description" =>
                    "Provides outpatient services and consultations.",
                "contact_number" => "123-456-7891",
                "email" => "outpatient@hospital.com",
                "location" => "First Floor",
            ],
            [
                "name" => "Radiology",
                "description" => "Offers diagnostic imaging services.",
                "contact_number" => "123-456-7892",
                "email" => "radiology@hospital.com",
                "location" => "Second Floor",
            ],
            [
                "name" => "Laboratory",
                "description" =>
                    "Provides diagnostic testing and pathology services.",
                "contact_number" => "123-456-7893",
                "email" => "laboratory@hospital.com",
                "location" => "Basement",
            ],
            [
                "name" => "Pharmacy",
                "description" =>
                    "Dispenses medications and manages prescriptions.",
                "contact_number" => "123-456-7894",
                "email" => "pharmacy@hospital.com",
                "location" => "Ground Floor",
            ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
