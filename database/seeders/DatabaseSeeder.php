<?php

namespace Database\Seeders;

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

        // Create permissions
        $manageUsers = Permission::create(["name" => "manage users"]);
        $manageAppointments = Permission::create([
            "name" => "manage appointments",
        ]);
        $managePrescriptions = Permission::create([
            "name" => "manage prescriptions",
        ]);
        $managePharmacy = Permission::create([
            "name" => "manage pharmacy",
        ]);
        $manageInventory = Permission::create([
            "name" => "manage inventory",
        ]);
        $manageBilling = Permission::create([
            "name" => "manage billing",
        ]);

        // Assign permissions to roles
        $admin->givePermissionTo([
            $manageUsers,
            $manageAppointments,
            $managePrescriptions,
            $managePharmacy,
            $manageInventory,
            $manageBilling,
        ]);
        $doctor->givePermissionTo($managePrescriptions);
        $nurse->givePermissionTo($managePrescriptions);
        $receptionist->givePermissionTo($manageAppointments);
        $pharmacist->givePermissionTo(
            $managePharmacy,
            $manageInventory,
            $manageBilling
        );
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
    }
}
