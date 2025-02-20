<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Patient;
use App\Models\Staff;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->rolePermissions();

        User::factory()->create([
            "firstname" => "Test",
            "lastname" => "User",
            "email" => "test@example.com",
            "password" => bcrypt("password"),
        ]);
        User::factory(10)->create();
        $this->assignRoles();

        $this->createDepartment();

        $this->createStaff();

        $this->createPatient();

        $this->createAppointment();
    }

    /**
     * Create roles and permissions.
     */
    public function rolePermissions(): void
    {
        // Create roles
        $admin = Role::create(["name" => "admin"]);
        $doctor = Role::create(["name" => "doctor"]);
        $nurse = Role::create(["name" => "nurse"]);
        $receptionist = Role::create(["name" => "receptionist"]);
        $pharmacist = Role::create(["name" => "pharmacist"]);
        $patient = Role::create(["name" => "patient"]);

        $hodEmergency = Role::create(["name" => "hodEmergency"]);
        $hodConsultancy = Role::create(["name" => "hodConsultancy"]);
        $hodRadiology = Role::create(["name" => "hodRadiology"]);
        $hodLaboratory = Role::create(["name" => "hodLaboratory"]);
        $hodPharmacy = Role::create(["name" => "hodPharmacy"]);

        // Create permissions
        $manageUsers = Permission::create(["name" => "manage-users"]);
        $manageAppointments = Permission::create([
            "name" => "manage-appointments",
        ]);
        $managePrescriptions = Permission::create([
            "name" => "manage-prescriptions",
        ]);
        $managePharmacy = Permission::create([
            "name" => "manage-pharmacy",
        ]);
        $manageInventory = Permission::create([
            "name" => "manage-inventory",
        ]);
        $manageBilling = Permission::create([
            "name" => "manage-billing",
        ]);
        $manageDepartmentEmergency = Permission::create([
            "name" => "manage-department-Emergency",
        ]);
        $manageDepartmentConsultancy = Permission::create([
            "name" => "manage-department-Consultancy",
        ]);
        $manageDepartmentRadiology = Permission::create([
            "name" => "manage-department-Radiology",
        ]);
        $manageDepartmentLaboratory = Permission::create([
            "name" => "manage-department-Laboratory",
        ]);
        $manageDepartmentPharmacy = Permission::create([
            "name" => "manage-department-Pharmacy",
        ]);
        $viewInformation = Permission::create([
            "name" => "view-information",
        ]);

        // Assign permissions to roles
        $admin->syncPermissions([
            "manage-users",
            "manage-appointments",
            "manage-prescriptions",
            "manage-pharmacy",
            "manage-inventory",
            "manage-billing",
            "manage-department-Consultancy",
            "manage-department-Radiology",
            "manage-department-Laboratory",
            "manage-department-Pharmacy",
            "view-information",
        ]);

        // Assign more targeted permissions for specific roles
        $doctor->syncPermissions(["manage-prescriptions", "view-information"]);
        $nurse->syncPermissions(["manage-prescriptions", "view-information"]);
        $receptionist->syncPermissions([
            "manage-appointments",
            "view-information",
        ]);
        $pharmacist->syncPermissions([
            "manage-pharmacy",
            "manage-inventory",
            "manage-billing",
            "view-information",
        ]);
        $patient->syncPermissions(["view-information"]);
    }

    /**
     * Assign roles to users.
     */
    public function assignRoles(): void
    {
        User::find(1)->assignRole("admin");
        User::find(2)->assignRole("doctor");
        User::find(3)->assignRole("nurse");
        User::find(4)->assignRole("receptionist");
        User::find(5)->assignRole("pharmacist");
        User::find(11)->assignRole("patient");
    }

    public function createDepartment(): void
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
                "name" => "Outpatient",
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
    public function createStaff(): void
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
    public function createPatient()
    {
        // Insert five patients
        $users = User::factory(5)->create();
        //get id of just created user
        $userIds = $users->pluck("id")->toArray();
        foreach ($userIds as $userId) {
            Patient::create([
                "mrn" => fake()->unique()->randomAscii(13),
                "user_id" => $userId,
                "date_of_birth" => fake()->date("Y-m-d"),
                "gender" => fake()->randomElement(["male", "female"]),
                "blood_group" => fake()->randomElement([
                    "A+",
                    "B+",
                    "AB+",
                    "O+",
                    "A-",
                    "B-",
                    "AB-",
                    "O-",
                ]),
                "address" => fake()->address(),
                "phone" => fake()->phoneNumber(),
                "emergency_contact_name" => fake()->name(),
                "emergency_contact_relationship" => fake()->randomElement([
                    "Father",
                    "Mother",
                    "Sibling",
                    "Spouse",
                ]),
                "emergency_contact_phone" => fake()->phoneNumber(),
            ]);
        }
    }

    public function createAppointment()
    {
        // Assuming you have existing patients and departments
        $patientIds = \App\Models\Patient::pluck("id")->toArray();
        $departmentIds = \App\Models\Department::pluck("id")->toArray();

        // Insert five appointments
        foreach (range(1, 5) as $index) {
            Appointment::create([
                "patient_id" => fake()->randomElement($patientIds),
                "staff_id" => 2, // Assigning staff_id 2 as the doctor
                "department_id" => fake()->randomElement($departmentIds),
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
