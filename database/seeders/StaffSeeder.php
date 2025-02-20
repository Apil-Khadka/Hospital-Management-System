<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Staff;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $staff = [
            [
                "user_id" => 1,
                "department_id" => 1,
                "specialization" => "Cardiology",
                "qualification" => "MD Cardiology",
                "experience_years" => 10,
                "license_number" => "LIC123456",
                "date_of_birth" => "1980-05-15",
                "gender" => "male",
                "phone_number" => "555-1234",
                "temporary_address" => "123 Temporary St, City",
                "permanent_address" => "456 Permanent Ave, City",
                "employment_status" => "full-time",
                "shift_details" => "Day Shift",
                "emergency_contact_name" => "Jane Doe",
                "emergency_contact_relationship" => "Spouse",
                "emergency_contact_phone" => "555-5678",
            ],
            [
                "user_id" => 2,
                "department_id" => 2,
                "specialization" => "Neurology",
                "qualification" => "MD Neurology",
                "experience_years" => 8,
                "license_number" => "LIC234567",
                "date_of_birth" => "1982-07-20",
                "gender" => "female",
                "phone_number" => "555-2345",
                "temporary_address" => "789 Temporary St, City",
                "permanent_address" => "101 Permanent Ave, City",
                "employment_status" => "part-time",
                "shift_details" => "Night Shift",
                "emergency_contact_name" => "John Smith",
                "emergency_contact_relationship" => "Brother",
                "emergency_contact_phone" => "555-6789",
            ],
            [
                "user_id" => 3,
                "department_id" => 3,
                "specialization" => "Pediatrics",
                "qualification" => "MD Pediatrics",
                "experience_years" => 5,
                "license_number" => "LIC345678",
                "date_of_birth" => "1985-09-10",
                "gender" => "female",
                "phone_number" => "555-3456",
                "temporary_address" => "234 Temporary St, City",
                "permanent_address" => "567 Permanent Ave, City",
                "employment_status" => "full-time",
                "shift_details" => "Evening Shift",
                "emergency_contact_name" => "Emily Johnson",
                "emergency_contact_relationship" => "Sister",
                "emergency_contact_phone" => "555-7890",
            ],
            [
                "user_id" => 4,
                "department_id" => 4,
                "specialization" => "Orthopedics",
                "qualification" => "MD Orthopedics",
                "experience_years" => 12,
                "license_number" => "LIC456789",
                "date_of_birth" => "1978-11-25",
                "gender" => "male",
                "phone_number" => "555-4567",
                "temporary_address" => "345 Temporary St, City",
                "permanent_address" => "678 Permanent Ave, City",
                "employment_status" => "contract",
                "shift_details" => "Weekend Shift",
                "emergency_contact_name" => "Michael Brown",
                "emergency_contact_relationship" => "Friend",
                "emergency_contact_phone" => "555-8901",
            ],
            [
                "user_id" => 5,
                "department_id" => 5,
                "specialization" => "Dermatology",
                "qualification" => "MD Dermatology",
                "experience_years" => 7,
                "license_number" => "LIC567890",
                "date_of_birth" => "1983-03-30",
                "gender" => "female",
                "phone_number" => "555-5678",
                "temporary_address" => "456 Temporary St, City",
                "permanent_address" => "789 Permanent Ave, City",
                "employment_status" => "full-time",
                "shift_details" => "Day Shift",
                "emergency_contact_name" => "Sarah Williams",
                "emergency_contact_relationship" => "Mother",
                "emergency_contact_phone" => "555-9012",
            ],
        ];

        foreach ($staff as $member) {
            Staff::create($member);
        }
    }
}
