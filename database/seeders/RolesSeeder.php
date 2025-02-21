<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->rolePermissions();
        $this->assignRoles();
    }
    public function rolePermissions(): void
    {
        // Create roles
        $admin = Role::create(["name" => "admin"]);
        $doctor = Role::create(["name" => "doctor"]);
        $nurse = Role::create(["name" => "nurse"]);
        $receptionist = Role::create(["name" => "receptionist"]);
        $pharmacist = Role::create(["name" => "pharmacist"]);
        $pathologist = Role::create(["name" => "pathologist"]);
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
        $manageLab = Permission::create([
            "name" => "manage-lab",
        ]);
        $createLabOrder = Permission::create([
            "name" => "create-lab-order",
        ]);
        $createBill = Permission::create([
            "name" => "create-bill",
        ]);
        $createBillItem = Permission::create([
            "name" => "create-bill-item",
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
            "manage-lab",
            "create-lab-order",
            "create-bill",
            "create-bill-item",
        ]);

        // Assign more targeted permissions for specific roles
        $doctor->syncPermissions([
            "manage-prescriptions",
            "view-information",
            "create-lab-order",
        ]);
        $nurse->syncPermissions(["manage-prescriptions", "view-information"]);
        $receptionist->syncPermissions([
            "manage-appointments",
            "view-information",
            "create-bill",
            "create-bill-item",
        ]);
        $pharmacist->syncPermissions([
            "manage-pharmacy",
            "manage-inventory",
            "manage-billing",
            "view-information",
            "create-bill",
            "create-bill-item",
        ]);
        $pathologist->syncPermissions([
            "manage-lab",
            "view-information",
            "create-bill-item",
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
        User::find(6)->assignRole("pathologist");
        User::find(7)->assignRole("hodEmergency");
        User::find(8)->assignRole("hodRadiology");
        User::find(9)->assignRole("hodLaboratory");
        User::find(10)->assignRole("hodPharmacy");
        User::find(11)->assignRole("hodConsultancy");
        User::find(12)->assignRole("doctor");
        foreach (range(13, 20) as $userId) {
            User::find($userId)->assignRole("patient");
        }
    }
}
