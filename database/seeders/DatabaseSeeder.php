<?php
namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'firstname' => 'Test',
            'lastname' => 'User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);
        User::factory()->create([
            'firstname' => 'Test',
            'lastname' => 'User',
            'email' => 'testdoctor@example.com',
            'password' => bcrypt('password'),
        ]);
        User::factory()->create([
            'firstname' => 'Test',
            'lastname' => 'User',
            'email' => 'testrecep@example.com',
            'password' => bcrypt('password'),
        ]);
        User::factory()->create([
            'firstname' => 'Test',
            'lastname' => 'User',
            'email' => 'testpatho@example.com',
            'password' => bcrypt('password'),
        ]);
        User::factory()->create([
            'firstname' => 'Test',
            'lastname' => 'User',
            'email' => 'testphar@example.com',
            'password' => bcrypt('password'),
        ]);

        User::factory(22)->create();
        $seeders = [
            RolesSeeder::class,
            DepartmentSeeder::class,
            StaffSeeder::class,
            PatientSeeder::class,
            AppointmentSeeder::class,
            MedicineCategorySeeder::class,
            MedicationSeeder::class,
            PrescriptionSeeder::class,
            PrescriptionDetailSeeder::class,
            LabTestSeeder::class,
            LabOrderSeeder::class,
            LabOrderDetailSeeder::class,
            BillSeeder::class,
            BillItemSeeder::class,
        ];

        foreach ($seeders as $seeder) {
            $this->call($seeder);
        }

        /**
         * Create roles and permissions.
         */
    }
}
