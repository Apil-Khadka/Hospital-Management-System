<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
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
}
